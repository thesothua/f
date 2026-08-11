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
        if ($user) {
            if (strtolower($user->status ?? 'Active') === 'inactive') {
                return ['error' => 'Your account is inactive. Please contact administrator.', 'status_code' => 403];
            }
            if ($user->hasRole('Visitor') || $user->role === 'Visitor' || $user->roles->isEmpty()) {
                if ($user->roles->isEmpty() && class_exists(\Spatie\Permission\Models\Role::class)) {
                    $visitorRole = \Spatie\Permission\Models\Role::firstOrCreate(
                        ['name' => 'Visitor', 'guard_name' => 'api'],
                        [
                            'allow_notification' => false,
                            'is_volunteer' => false,
                            'role_description' => 'Default role for registered website visitors.'
                        ]
                    );
                    $user->assignRole($visitorRole);
                }
                return ['error' => 'Access denied. Visitor accounts are not allowed to access the admin portal.', 'status_code' => 403];
            }
            if (Hash::check($data['password'], $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return [
                    'user' => $user->load('roles.permissions', 'permissions'),
                    'token' => $token,
                ];
            }
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
            'status' => 'Active',
        ]);

        // Assign default 'Visitor' role
        if (class_exists(\Spatie\Permission\Models\Role::class)) {
            $visitorRole = \Spatie\Permission\Models\Role::firstOrCreate(
                ['name' => 'Visitor', 'guard_name' => 'api'],
                [
                    'allow_notification' => false,
                    'is_volunteer' => false,
                    'role_description' => 'Default role for registered website visitors.'
                ]
            );
            $user->assignRole($visitorRole);
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

        if ($user && strtolower($user->status ?? 'Active') === 'inactive') {
            return ['error' => 'Your account is inactive. Please contact administrator.', 'status_code' => 403];
        }

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
                'status' => 'Active',
            ]);

            if (class_exists(\Spatie\Permission\Models\Role::class)) {
                $visitorRole = \Spatie\Permission\Models\Role::firstOrCreate(
                    ['name' => 'Visitor', 'guard_name' => 'api'],
                    [
                        'allow_notification' => false,
                        'is_volunteer' => false,
                        'role_description' => 'Default role for registered website visitors.'
                    ]
                );
                $user->assignRole($visitorRole);
            }
        } else {
            // Ensure existing user has at least Visitor role if they currently have no roles
            if ($user->roles->isEmpty() && class_exists(\Spatie\Permission\Models\Role::class)) {
                $visitorRole = \Spatie\Permission\Models\Role::firstOrCreate(
                    ['name' => 'Visitor', 'guard_name' => 'api'],
                    [
                        'allow_notification' => false,
                        'is_volunteer' => false,
                        'role_description' => 'Default role for registered website visitors.'
                    ]
                );
                $user->assignRole($visitorRole);
            }

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
