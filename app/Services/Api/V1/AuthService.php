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
                'user' => $user->load('roles'),
                'token' => $token,
            ];
        }
        return false;
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
            return $user->load('roles');
        }
        return null;
    }
}
