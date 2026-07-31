<?php

namespace App\Services\Api\V1;

use Spatie\Permission\Models\Role;

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
            'guard_name' => $data['guard_name'] ?? 'api'
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
            $role->save();
        }

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
