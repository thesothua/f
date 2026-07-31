<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddRescuePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view animal reports',
            'edit animal reports',
            'delete animal reports',
            'view rescue cases',
            'edit rescue cases',
            'delete rescue cases',
        ];

        foreach ($permissions as $permName) {
            Permission::firstOrCreate([
                'name' => $permName,
                'guard_name' => 'api'
            ]);
        }

        // Give these new permissions to the Super Admin role
        $superAdmin = Role::where('name', 'Super Admin')->where('guard_name', 'api')->first();
        if ($superAdmin) {
            $superAdmin->givePermissionTo($permissions);
        }

        $this->command->info('New rescue system permissions seeded and synced with Super Admin successfully!');
    }
}
