<?php

namespace App\Services\Api\V1;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login($data)
    {
        $user = User::where('email', $data['email'])->first();
        if ($user && Hash::check($data['password'], $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return [
                'user' => $user->load('roles.permissions', 'permissions'),
                'token' => $token,
            ];
        }
        return false;
    }

    public function register($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'] ?? null,
            'avatar' => $data['avatar'] ?? null,
            'dob' => $data['dob'] ?? null,
            'anniversary' => $data['anniversary'] ?? null,
        ]);

        // Assign default 'User' role if Spatie Role exists
        if (class_exists(\Spatie\Permission\Models\Role::class)) {
            $userRole = \Spatie\Permission\Models\Role::where('name', 'User')->first();
            if ($userRole) {
                $user->assignRole($userRole);
            }
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user->load('roles.permissions', 'permissions'),
            'token' => $token,
        ];
    }

    public function googleLogin($data)
    {
        $email = $data['email'];
        $name = $data['name'] ?? explode('@', $email)[0];
        $avatar = $data['avatar'] ?? null;
        $phone = $data['phone'] ?? null;
        $dob = $data['dob'] ?? null;
        $gender = $data['gender'] ?? null;
        $anniversary = $data['anniversary'] ?? null;

        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make(\Illuminate\Support\Str::random(24)),
                'avatar' => $avatar,
                'phone' => $phone,
                'dob' => $dob,
                'gender' => $gender,
                'anniversary' => $anniversary,
            ]);

            if (class_exists(\Spatie\Permission\Models\Role::class)) {
                $userRole = \Spatie\Permission\Models\Role::where('name', 'User')->first();
                if ($userRole) {
                    $user->assignRole($userRole);
                }
            }
        } else {
            $updated = false;
            if (empty($user->avatar) && !empty($avatar)) {
                $user->avatar = $avatar;
                $updated = true;
            }
            if (!empty($phone)) {
                $user->phone = $phone;
                $updated = true;
            }
            if (!empty($dob)) {
                $user->dob = $dob;
                $updated = true;
            }
            if (!empty($gender)) {
                $user->gender = $gender;
                $updated = true;
            }
            if (!empty($anniversary)) {
                $user->anniversary = $anniversary;
                $updated = true;
            }
            if ($updated) {
                $user->save();
            }
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user->load('roles.permissions', 'permissions'),
            'token' => $token,
        ];
    }

    public function logout($user)
    {
        if ($user) {
            if ($user->currentAccessToken()) {
                $user->currentAccessToken()->delete();
            } else {
                $user->tokens()->delete();
            }
            return true;
        }
        return false;
    }

    public function me($user)
    {
        if ($user) {
            return $user->load('roles.permissions', 'permissions');
        }
        return null;
    }
}
