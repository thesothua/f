<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index(Request $request)
    {
        $roles = $this->roleService->getAllRoles();
        return $this->successResponse($roles, 'Roles retrieved successfully.');
    }

    public function permissions(Request $request)
    {
        $permissions = \Spatie\Permission\Models\Permission::where('guard_name', 'api')->get(['id', 'name']);
        return $this->successResponse($permissions, 'Permissions retrieved successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,NULL,id,guard_name,api',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
        ]);

        $role = $this->roleService->createRole($request->only(['name', 'permissions']));
        return $this->successResponse($role, 'Role created successfully.');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id . ',id,guard_name,api',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
        ]);

        $role = $this->roleService->updateRole($id, $request->only(['name', 'permissions']));
        return $this->successResponse($role, 'Role updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $this->roleService->deleteRole($id);
            return $this->successResponse(null, 'Role deleted successfully.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }
}
