<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

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
            'Rescue Volunteer' => 'Responsible for emergency field rescue operations, animal transportation, and medical care coordination.',
            'Event Volunteer' => 'Assists in organizing adoption drives, community awareness campaigns, and local events.',
            'Fundraising Volunteer' => 'Helps with donor engagement, corporate CSR outreach, and fundraising campaigns.',
            'Social Media Volunteer' => 'Manages digital media content, creates reels, and engages supporters across social channels.',
        ];

        foreach ($volunteerRoles as $roleName => $description) {
            $role = Role::firstOrCreate(
                ['name' => $roleName, 'guard_name' => 'api'],
                [
                    'allow_notification' => false,
                    'is_volunteer' => true,
                    'role_description' => $description,
                ]
            );
            $role->update([
                'allow_notification' => false,
                'is_volunteer' => true,
                'role_description' => $description,
            ]);
        }

        $this->command->info('Volunteer roles with descriptions seeded successfully!');
    }
}
