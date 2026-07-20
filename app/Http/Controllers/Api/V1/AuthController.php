<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\AuthService;
use Illuminate\Http\Request;

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
}
