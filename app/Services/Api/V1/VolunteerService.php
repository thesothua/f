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

        $sortBy = $params['sortBy'] ?? 'created_at';
        // Map camelCase sort fields to snake_case column names if necessary
        if ($sortBy === 'fullName') {
            $sortBy = 'full_name';
        }

        $order = strtolower($params['order'] ?? 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortBy, $order);

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate((int) $params['limit']);
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

        // Map volunteer roles to Spatie roles
        $roleMap = [
            'rescue' => 'Rescue Volunteer',
            'event' => 'Event Volunteer',
            'fundraising' => 'Fundraising Volunteer',
            'social' => 'Social Media Volunteer',
        ];
        $roleName = $roleMap[$volunteer->role] ?? ucwords($volunteer->role) . ' Volunteer';

        // Ensure Spatie role exists for the api guard
        Role::firstOrCreate([
            'name' => $roleName,
            'guard_name' => 'api'
        ]);

        if ($user) {
            // Assign the role if not already assigned
            if (!$user->hasRole($roleName)) {
                $user->assignRole($roleName);
            }
            return;
        }

        // Split name into first and last name
        $parts = explode(' ', trim($volunteer->full_name), 2);
        $firstName = $parts[0] ?? '';
        $lastName = $parts[1] ?? '';

        // Generate clean temporary password
        $password = Str::random(10);

        // Create the user
        $user = User::create([
            'name' => $volunteer->full_name,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $volunteer->email,
            'phone' => $volunteer->phone,
            'password' => Hash::make($password),
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
