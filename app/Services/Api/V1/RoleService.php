<?php

namespace App\Services\Api\V1;

use App\Models\Role;

class RoleService
{
    public function getAllRoles()
    {
        return Role::where('guard_name', 'api')->with('permissions')->get();
    }

    public function createRole(array $data)
    {
        $role = Role::create([
            'name' => $data['name'],
            'guard_name' => $data['guard_name'] ?? 'api',
            'is_volunteer' => isset($data['is_volunteer']) ? filter_var($data['is_volunteer'], FILTER_VALIDATE_BOOLEAN) : false,
            'allow_notification' => isset($data['allow_notification']) ? filter_var($data['allow_notification'], FILTER_VALIDATE_BOOLEAN) : false,
            'role_description' => $data['role_description'] ?? $data['roleDescription'] ?? null,
        ]);

        if (isset($data['permissions'])) {
            $role->syncPermissions($data['permissions']);
        }

        return $role->load('permissions');
    }

    public function updateRole($id, array $data)
    {
        $role = Role::findOrFail($id);
        
        if (isset($data['name'])) {
            $role->name = $data['name'];
        }

        if (array_key_exists('is_volunteer', $data)) {
            $role->is_volunteer = filter_var($data['is_volunteer'], FILTER_VALIDATE_BOOLEAN);
        }

        if (array_key_exists('allow_notification', $data)) {
            $role->allow_notification = filter_var($data['allow_notification'], FILTER_VALIDATE_BOOLEAN);
        }

        if (array_key_exists('role_description', $data) || array_key_exists('roleDescription', $data)) {
            $role->role_description = $data['role_description'] ?? $data['roleDescription'] ?? null;
        }

        $role->save();

        if (isset($data['permissions'])) {
            $role->syncPermissions($data['permissions']);
        }

        return $role->load('permissions');
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        
        // Prevent deleting Super Admin
        if ($role->name === 'Super Admin') {
            throw new \Exception('Super Admin role cannot be deleted.');
        }

        return $role->delete();
    }
}
