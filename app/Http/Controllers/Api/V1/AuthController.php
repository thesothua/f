<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $result = $this->authService->login($request->all());
        if (!$result) {
            return $this->errorResponse('Invalid email or password.', 401);
        }
        return $this->successResponse($result, 'User logged in successfully.');
    }

    public function logout(Request $request)
    {
        $status = $this->authService->logout($request->user());
        if (!$status) {
            return $this->errorResponse('Logout failed.', 400);
        }
        return $this->successResponse(null, 'User logged out successfully.');
    }

    public function me(Request $request)
    {
        $user = $this->authService->me($request->user());
        if (!$user) {
            return $this->errorResponse('User not found.', 404);
        }
        return $this->successResponse($user, 'User retrieved successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|string|max:1000',
            'current_password' => 'nullable|string|required_with:password',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return $this->errorResponse('The provided current password does not match our records.', 422);
            }
            $user->password = Hash::make($request->input('password'));
        }

        $user->fill($request->only([
            'first_name',
            'last_name',
            'phone',
            'bio',
            'avatar',
        ]));

        $user->name = trim($request->input('first_name') . ' ' . $request->input('last_name'));
        if (empty($user->name)) {
            $user->name = $user->email;
        }

        $user->save();

        return $this->successResponse($user->load('roles'), 'Profile updated successfully.');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = \Illuminate\Support\Facades\Password::broker()->sendResetLink(
            $request->only('email')
        );

        return $status === \Illuminate\Support\Facades\Password::RESET_LINK_SENT
            ? $this->successResponse(null, __($status))
            : $this->errorResponse(__($status), 422);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = \Illuminate\Support\Facades\Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => \Illuminate\Support\Facades\Hash::make($password)
                ])->setRememberToken(\Illuminate\Support\Str::random(60));

                $user->save();

                event(new \Illuminate\Auth\Events\PasswordReset($user));
            }
        );

        return $status === \Illuminate\Support\Facades\Password::PASSWORD_RESET
            ? $this->successResponse(null, __($status))
            : $this->errorResponse(__($status), 422);
    }
}
