<?php

namespace App\Services\Api\V1;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    public function getAllUsers($params = [])
    {
        $query = User::with('roles');

        if (!empty($params['search'])) {
            $search = $params['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $allowedSorts = ['name', 'email', 'created_at', 'status'];
        $sortBy = in_array($params['sortBy'] ?? '', $allowedSorts) ? $params['sortBy'] : null;

        if ($sortBy) {
            $order = strtolower($params['order'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
            $query->orderBy($sortBy, $order);
        } else {
            $query->latest();
        }

        $limit = min((int) ($params['limit'] ?? 15), 100);
        if (!empty($params['page']) || !empty($params['limit'])) {
            return $query->paginate($limit);
        }

        return $query->get();
    }

    public function getUserById($id)
    {
        return User::with('roles')->find($id);
    }

    public function createUser($data)
    {
        $name = trim($data['name'] ?? ($data['email'] ?? 'User'));

        $userData = [
            'name' => $name,
            'email' => $data['email'],
            'gender' => $data['gender'] ?? null,
            'phone' => $data['phone'] ?? null,
            'bio' => $data['bio'] ?? null,
            'avatar' => $data['avatar'] ?? null,
            'dob' => $data['dob'] ?? null,
            'anniversary' => $data['anniversary'] ?? null,
            'status' => $data['status'] ?? 'Active',
            'show_in_website' => filter_var($data['show_in_website'] ?? $data['showInWebsite'] ?? false, FILTER_VALIDATE_BOOLEAN),
            'password' => Hash::make($data['password'] ?? \Illuminate\Support\Str::random(16)),
        ];

        $user = User::create($userData);

        if (!empty($data['role'])) {
            Role::firstOrCreate([
                'name' => $data['role'],
                'guard_name' => 'api'
            ]);
            $user->syncRoles([$data['role']]);
        }

        return $user->fresh(['roles']);
    }

    public function updateUser($id, $data)
    {
        $user = User::find($id);
        if (!$user) {
            return null;
        }

        $userData = [
            'name' => trim($data['name'] ?? $user->name),
            'email' => $data['email'] ?? $user->email,
            'gender' => $data['gender'] ?? $user->gender,
        ];

        if (array_key_exists('status', $data)) {
            $userData['status'] = $data['status'];
        }
        if (array_key_exists('phone', $data)) {
            $userData['phone'] = $data['phone'];
        }
        if (array_key_exists('bio', $data)) {
            $userData['bio'] = $data['bio'];
        }
        if (array_key_exists('avatar', $data)) {
            $userData['avatar'] = $data['avatar'];
        }
        if (array_key_exists('dob', $data)) {
            $userData['dob'] = $data['dob'];
        }
        if (array_key_exists('anniversary', $data)) {
            $userData['anniversary'] = $data['anniversary'];
        }
        if (array_key_exists('show_in_website', $data) || array_key_exists('showInWebsite', $data)) {
            $val = $data['show_in_website'] ?? $data['showInWebsite'];
            $userData['show_in_website'] = filter_var($val, FILTER_VALIDATE_BOOLEAN);
        }

        if (!empty($data['password'])) {
            $userData['password'] = Hash::make($data['password']);
        }

        $user->update($userData);

        if (!empty($data['role'])) {
            Role::firstOrCreate([
                'name' => $data['role'],
                'guard_name' => 'api'
            ]);
            $user->syncRoles([$data['role']]);
        }

        return $user->fresh(['roles']);
    }

    public function getTeamMembers()
    {
        return User::with('roles:id,name')
            ->where('show_in_website', true)
            ->whereDoesntHave('roles', function ($query) {
                $query->where('is_volunteer', true)
                    ->orWhere('name', 'Visitor');
            })
            ->latest()
            ->get(['id', 'name', 'avatar', 'bio', 'show_in_website']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}
