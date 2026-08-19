<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Api\V1\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @group Role & Access Control (RBAC)
 *
 * APIs for defining security roles, permissions, and access controls.
 */
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
            'is_volunteer' => 'nullable|boolean',
            'allow_notification' => 'nullable|boolean',
            'role_description' => 'nullable|string',
            'roleDescription' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
        ]);

        $data = $request->only(['name', 'is_volunteer', 'allow_notification', 'permissions']);
        $data['role_description'] = $request->input('role_description') ?? $request->input('roleDescription');

        $role = $this->roleService->createRole($data);
        Cache::forget('roles.public_volunteer');
        return $this->successResponse($role, 'Role created successfully.');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id . ',id,guard_name,api',
            'is_volunteer' => 'nullable|boolean',
            'allow_notification' => 'nullable|boolean',
            'role_description' => 'nullable|string',
            'roleDescription' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'string',
        ]);

        $data = $request->only(['name', 'is_volunteer', 'allow_notification', 'permissions']);
        $data['role_description'] = $request->input('role_description') ?? $request->input('roleDescription');

        $role = $this->roleService->updateRole($id, $data);
        Cache::forget('roles.public_volunteer');
        return $this->successResponse($role, 'Role updated successfully.');
    }

    public function publicVolunteerRoles()
    {
        $roles = Cache::remember('roles.public_volunteer', now()->addDays(1), function () {
            return \App\Models\Role::where('guard_name', 'api')
                ->where('is_volunteer', true)
                ->get(['id', 'name', 'role_description']);
        });

        return $this->successResponse($roles, 'Public volunteer roles retrieved successfully.');
    }

    public function destroy($id)
    {
        return $this->errorResponse('Deleting roles is disabled.', 403);
    }
}
