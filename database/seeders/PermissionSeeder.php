<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // Dashboard
            'view dashboard',

            // Users
            'view users',
            'create users',
            'edit users',
            'delete users',

            // Roles & Permissions
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'assign roles',

            // Campaigns
            'view campaigns',
            'create campaigns',
            'edit campaigns',
            'delete campaigns',

            // Plans
            'view plans',
            'create plans',
            'edit plans',
            'delete plans',

            // Donations
            'view donations',
            'create donations',
            'edit donations',
            'delete donations',
            'send donations invoice',

            // Subscriptions
            'view subscriptions',
            'edit subscriptions',
            'cancel subscriptions',

            // Volunteers
            'view volunteers',
            'create volunteers',
            'edit volunteers',
            'delete volunteers',
            'approve volunteers',

            // Blogs
            'view blogs',
            'create blogs',
            'edit blogs',
            'delete blogs',

            // Media
            'view media',
            'create media',
            'edit media',
            'delete media',

            // Attachments
            'view attachments',
            'create attachments',
            'delete attachments',

            // Contacts
            'view contacts',
            'edit contacts',
            'delete contacts',

            // Settings
            'view settings',
            'edit settings',

            // Animal Reports
            'view animal reports',
            'edit animal reports',
            'delete animal reports',

            // Rescue Cases
            'view rescue cases',
            'edit rescue cases',
            'delete rescue cases',

            // Contributions
            'view contributions',
            'create contributions',
            'edit contributions',
            'delete contributions',

            // Auto Feeders
            'view auto feeders',
            'create auto feeders',
            'edit auto feeders',
            'delete auto feeders',
        ];

        foreach ($permissions as $permName) {
            Permission::firstOrCreate([
                'name' => $permName,
                'guard_name' => 'api'
            ]);
        }

        // Give all permissions to team roles
        $teamRoles = Role::whereIn('name', [
            'Founder & Director',
            'Director for Operations (COO)',
            'Rescue & Field Operations Head',
            'Social Media & Content Manager',
            'Technical Advisor',
        ])->get();

        foreach ($teamRoles as $role) {
            $role->syncPermissions($permissions);
        }

        // Give view dashboard permission to volunteer roles
        $volunteerRoles = Role::where('is_volunteer', true)->orWhereIn('name', [
            'Rescue Volunteer',
            'Event Volunteer',
            'Fundraising Volunteer',
            'Social Media Volunteer',
        ])->get();

        $this->command->info('Permissions seeded and assigned to team & volunteer roles successfully!');
    }
}
