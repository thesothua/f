<?php

namespace App\Services\Api\V1;

use App\Models\Volunteer;
use App\Models\User;
use App\Mail\VolunteerApprovedMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class VolunteerService
{
    public function getAllVolunteers($params = [])
    {
        $query = Volunteer::query();

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%")
                    ->orWhere('role', 'like', "%{$search}%")
                    ->orWhere('reason', 'like', "%{$search}%");
            });
        }

        if (!empty($params['role'])) {
            $query->where('role', $params['role']);
        }

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        $allowedSorts = ['full_name', 'email', 'phone', 'city', 'role', 'status', 'created_at'];
        $sortByInput = $params['sortBy'] ?? 'created_at';
        if ($sortByInput === 'fullName') {
            $sortByInput = 'full_name';
        }
        $sortBy = in_array($sortByInput, $allowedSorts) ? $sortByInput : 'created_at';

        $order = strtolower($params['order'] ?? 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $order);

        $limit = min((int) ($params['limit'] ?? 15), 100);
        if (!empty($params['page']) || !empty($params['limit'])) {
            return $query->paginate($limit);
        }

        return $query->get();
    }

    public function getVolunteerById($id)
    {
        return Volunteer::with(['activities.causer'])->find($id);
    }

    public function createVolunteer($data)
    {
        return Volunteer::create([
            'full_name'   => $data['fullName'] ?? $data['full_name'] ?? '',
            'email'       => $data['email'] ?? '',
            'phone'       => $data['phone'] ?? null,
            'city'        => $data['city'] ?? null,
            'role'        => $data['role'] ?? 'rescue',
            'reason'      => $data['reason'] ?? null,
            'status'      => $data['status'] ?? 'Pending',
            'admin_notes' => $data['adminNotes'] ?? $data['admin_notes'] ?? null,
        ]);
    }

    public function updateVolunteer($id, $data)
    {
        $volunteer = Volunteer::find($id);
        if (!$volunteer) {
            return null;
        }

        $oldStatus = $volunteer->status;

        $updateData = [];

        if (isset($data['fullName']) || isset($data['full_name'])) {
            $updateData['full_name'] = $data['fullName'] ?? $data['full_name'];
        }
        if (isset($data['email'])) {
            $updateData['email'] = $data['email'];
        }
        if (array_key_exists('phone', $data)) {
            $updateData['phone'] = $data['phone'];
        }
        if (array_key_exists('city', $data)) {
            $updateData['city'] = $data['city'];
        }
        if (isset($data['role'])) {
            $updateData['role'] = $data['role'];
        }
        if (array_key_exists('reason', $data)) {
            $updateData['reason'] = $data['reason'];
        }
        if (isset($data['status'])) {
            $updateData['status'] = $data['status'];
        }
        if (array_key_exists('adminNotes', $data) || array_key_exists('admin_notes', $data)) {
            $updateData['admin_notes'] = $data['adminNotes'] ?? $data['admin_notes'] ?? null;
        }

        $volunteer->update($updateData);
        $volunteer = $volunteer->fresh();

        if ($volunteer->status === 'Approved' && $oldStatus !== 'Approved') {
            $this->approveVolunteer($volunteer);
        }

        return $volunteer;
    }

    protected function approveVolunteer($volunteer)
    {
        // Check if user already exists
        $user = User::where('email', $volunteer->email)->first();

        // Resolve volunteer role dynamically
        $roleName = trim($volunteer->role);

        $existingRole = \App\Models\Role::where('guard_name', 'api')
            ->where(function ($query) use ($roleName) {
                $query->where('name', $roleName)
                    ->orWhereRaw('LOWER(name) = ?', [strtolower($roleName)]);
            })
            ->first();

        if ($existingRole) {
            $roleName = $existingRole->name;
        }

        // Ensure role exists for the api guard with is_volunteer = true
        \App\Models\Role::firstOrCreate(
            ['name' => $roleName, 'guard_name' => 'api'],
            ['is_volunteer' => true]
        );

        if ($user) {
            // Assign the role if not already assigned
            if (!$user->hasRole($roleName)) {
                $user->assignRole($roleName);
            }
            $user->update(['show_in_website' => true]);
            return;
        }

        // Generate clean temporary password
        $password = Str::random(10);

        // Create the user
        $user = User::create([
            'name' => $volunteer->full_name,
            'email' => $volunteer->email,
            'phone' => $volunteer->phone,
            'bio' => $volunteer->reason ?? ("As a " . $volunteer->role),
            'password' => Hash::make($password),
            'show_in_website' => false,
        ]);

        // Assign the role
        $user->assignRole($roleName);

        // Send email
        try {
            Mail::to($user->email)->send(new VolunteerApprovedMail($user, $password, $roleName));
        } catch (\Exception $e) {
            Log::error('Failed to send volunteer credentials email: ' . $e->getMessage());
        }
    }

    public function getPublicVolunteers()
    {
        // Fetch Users who have roles marked as volunteer roles (is_volunteer = true) and show_in_website = true
        return User::where('show_in_website', true)
            ->whereHas('roles', function ($query) {
                $query->where('is_volunteer', true);
            })
            ->with('roles')
            ->latest()
            ->get()
            ->map(function ($user) {
                $volunteerRole = $user->roles->firstWhere('is_volunteer', true);
                $roleName = $volunteerRole ? $volunteerRole->name : ($user->roles->first()?->name ?? 'Volunteer');

                return [
                    'id'              => $user->id,
                    'full_name'       => $user->name,
                    'fullName'        => $user->name,
                    'city'            => $user->city ?? 'Pune',
                    'role'            => $roleName,
                    'reason'          => $user->bio,
                    'bio'             => $user->bio,
                    'avatar'          => $user->avatar,
                    'show_in_website' => (bool) $user->show_in_website,
                    'created_at'      => $user->created_at,
                ];
            })
            ->values();
    }

    public function deleteVolunteer($id)
    {
        $volunteer = Volunteer::find($id);
        if (!$volunteer) {
            return false;
        }

        $volunteer->delete();
        return true;
    }
}
