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
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (!empty($params['sortBy'])) {
            $order = strtolower($params['order'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
            $query->orderBy($params['sortBy'], $order);
        } else {
            $query->latest();
        }

        if (!empty($params['page']) && !empty($params['limit'])) {
            return $query->paginate($params['limit']);
        }

        return $query->get();
    }

    public function getUserById($id)
    {
        return User::with('roles')->find($id);
    }

    public function createUser($data)
    {
        $firstName = $data['firstName'] ?? $data['first_name'] ?? '';
        $lastName = $data['lastName'] ?? $data['last_name'] ?? '';
        $name = trim(($data['name'] ?? null) ?: "{$firstName} {$lastName}");

        $userData = [
            'name' => $name ?: ($data['email'] ?? 'User'),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $data['email'],
            'gender' => $data['gender'] ?? null,
            'password' => Hash::make($data['password'] ?? 'password123'),
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

        $firstName = $data['firstName'] ?? $data['first_name'] ?? $user->first_name;
        $lastName = $data['lastName'] ?? $data['last_name'] ?? $user->last_name;
        $name = trim(($data['name'] ?? null) ?: "{$firstName} {$lastName}");

        $userData = [
            'name' => $name,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $data['email'] ?? $user->email,
            'gender' => $data['gender'] ?? $user->gender,
        ];

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
