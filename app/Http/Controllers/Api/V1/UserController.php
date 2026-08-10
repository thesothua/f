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
        $users = $this->userService->getAllUsers($request->only(['search', 'sortBy', 'order', 'page', 'limit']));
        return $this->successResponse($users, 'Users retrieved successfully.');
    }

    public function teamMembers(Request $request)
    {
        $users = $this->userService->getTeamMembers();
        return $this->successResponse($users, 'Team members retrieved successfully.');
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
            'status' => 'nullable|string|in:Active,Inactive',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|string',
            'dob' => 'nullable|date',
            'anniversary' => 'nullable|date',
            'show_in_website' => 'nullable|boolean',
            'showInWebsite' => 'nullable|boolean',
        ]);

        $user = $this->userService->createUser($request->only(['email', 'firstName', 'lastName', 'first_name', 'last_name', 'name', 'status', 'bio', 'avatar', 'dob', 'anniversary', 'show_in_website', 'showInWebsite', 'role', 'gender', 'phone', 'password']));
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
            'status' => 'nullable|string|in:Active,Inactive',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|string',
            'dob' => 'nullable|date',
            'anniversary' => 'nullable|date',
            'show_in_website' => 'nullable|boolean',
            'showInWebsite' => 'nullable|boolean',
        ]);

        $updatedUser = $this->userService->updateUser($id, $request->only(['email', 'firstName', 'lastName', 'first_name', 'last_name', 'name', 'status', 'bio', 'avatar', 'dob', 'anniversary', 'show_in_website', 'showInWebsite', 'role', 'gender', 'phone', 'password']));
        return $this->successResponse($updatedUser, 'User updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        return $this->errorResponse('Deleting users is disabled. You can change user status to Inactive instead.', 403);
    }
}
