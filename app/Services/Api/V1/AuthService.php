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

        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make(\Illuminate\Support\Str::random(24)),
                'avatar' => $avatar,
            ]);

            if (class_exists(\Spatie\Permission\Models\Role::class)) {
                $userRole = \Spatie\Permission\Models\Role::where('name', 'User')->first();
                if ($userRole) {
                    $user->assignRole($userRole);
                }
            }
        } else {
            if (empty($user->avatar) && !empty($avatar)) {
                $user->avatar = $avatar;
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
