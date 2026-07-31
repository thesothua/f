<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class VolunteerRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $volunteerRoles = [
            'Rescue Volunteer',
            'Event Volunteer',
            'Fundraising Volunteer',
            'Social Media Volunteer',
        ];

        foreach ($volunteerRoles as $roleName) {
            $role = Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'api'
            ]);
            $role->update(['allow_notification' => false]);
        }

        $this->command->info('Volunteer roles seeded successfully!');
    }
}
