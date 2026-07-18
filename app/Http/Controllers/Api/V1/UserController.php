<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Services\Api\V1\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return $this->userService->getAllUsers();
    }

    public function show(Request $request, $id)
    {
        return $this->userService->getUserById($id);
    }

    public function store(Request $request)
    {
        return $this->userService->createUser($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->userService->updateUser($id, $request->all());
    }

    public function destroy(Request $request, $id)
    {
        return $this->userService->deleteUser($id);
    }
}
