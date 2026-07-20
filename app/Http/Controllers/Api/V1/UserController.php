<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->getAllUsers($request->all());
        return $this->successResponse($users, 'Users retrieved successfully.');
    }

    public function show(Request $request, $id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return $this->errorResponse('User not found.', 404);
        }
        return $this->successResponse($user, 'User retrieved successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'password' => 'nullable|string|min:6',
        ]);

        $user = $this->userService->createUser($request->all());
        return $this->successResponse($user, 'User created successfully.', 201);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return $this->errorResponse('User not found.', 404);
        }

        $request->validate([
            'email' => ['sometimes', 'required', 'email', Rule::unique('users')->ignore($id)],
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'password' => 'nullable|string|min:6',
        ]);

        $updatedUser = $this->userService->updateUser($id, $request->all());
        return $this->successResponse($updatedUser, 'User updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return $this->errorResponse('User not found.', 404);
        }
        $this->userService->deleteUser($id);
        return $this->successResponse(null, 'User deleted successfully.');
    }
}
