<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create the Super Admin role for 'api' guard
        $superAdminRole = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'api'
        ]);

        // Create or find the Super Admin user
        $superAdminUser = User::firstOrCreate(
            ['email' => env('MAIL_FROM_ADDRESS', 'admin@furrydom.com')],
            [
                'name' => 'Praveen Suthar',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Assign the role to the user
        $superAdminUser->assignRole($superAdminRole);

        $otherRoles = [
            'Founder & Director',
            'Director for Operations',
            'Rescue & Field Operations',
            'Social Media & Content Manager',
            'Adoption & Foster Care Coordinator',
            'Veterinary & Animal Welfare',
            'Volunteer Coordinator',
        ];

        foreach ($otherRoles as $roleName) {
            Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'api'
            ]);
        }

        $this->command->info('Super Admin user created/updated successfully!');
    }
}
