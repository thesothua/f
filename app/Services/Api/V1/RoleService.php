<?php

namespace App\Services\Api\V1;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function getAllRoles()
    {
        return Role::where('guard_name', 'api')->get(['id', 'name', 'guard_name']);
    }
}
