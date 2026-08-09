<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Roles Definition (in exact sequence)
        $rolesData = [
            'Founder & Director' => ['allow_notification' => false, 'is_volunteer' => false],
            'Director for Operations (COO)' => ['allow_notification' => false, 'is_volunteer' => false],
            'Rescue & Field Operations Head' => ['allow_notification' => false, 'is_volunteer' => false],
            'Social Media & Content Manager' => ['allow_notification' => false, 'is_volunteer' => false],
            'Technical Advisor' => ['allow_notification' => false, 'is_volunteer' => false],
        ];

        foreach ($rolesData as $roleName => $attributes) {
            $role = Role::firstOrCreate(
                ['name' => $roleName, 'guard_name' => 'api'],
                $attributes
            );
            $role->update($attributes);
        }

        // 2. Team Members / Users Seeding Data (in exact sequence)
        $teamMembers = [
            [
                'name' => 'Amit Kumar',
                'first_name' => 'Amit',
                'last_name' => 'Kumar',
                'email' => 'amit.kumar@furrydom.org',
                'bio' => 'Founder & Director at Furrydom India, working towards animal welfare, rescue missions, sustainable feeding initiatives, and child development programs since 2020.',
                'roles' => ['Founder & Director'],
            ],
            [
                'name' => 'Divya Kumariya',
                'first_name' => 'Divya',
                'last_name' => 'Kumariya',
                'email' => 'divya.kumariya@furrydom.org',
                'bio' => 'Managing fundraising operations and donor engagement initiatives across Maharashtra and Karnataka.',
                'roles' => ['Director for Operations (COO)'],
            ],
            [
                'name' => 'Jatin Jadhav',
                'first_name' => 'Jatin',
                'last_name' => 'Jadhav',
                'email' => 'jatin.jadhav@furrydom.org',
                'bio' => 'Managing rescue operations, emergency response, treatment coordination, and animal adoption initiatives.',
                'roles' => ['Rescue & Field Operations Head'],
            ],
            [
                'name' => 'Sakshi More',
                'first_name' => 'Sakshi',
                'last_name' => 'More',
                'email' => 'sakshi.more@furrydom.org',
                'bio' => 'Managing social media content, supporter engagement, and digital outreach initiatives.',
                'roles' => ['Social Media & Content Manager'],
            ],
            [
                'name' => 'Praveen Suthar',
                'first_name' => 'Praveen',
                'last_name' => 'Suthar',
                'email' => env('MAIL_FROM_ADDRESS', 'thesothua@gmail.com'),
                'bio' => 'Providing technical guidance and managing Furrydom India’s website, digital platforms, and technology initiatives to support the organization’s operations, outreach, and mission.',
                'roles' => ['Technical Advisor'],
            ],
        ];

        foreach ($teamMembers as $member) {
            $user = User::firstOrCreate(
                ['email' => $member['email']],
                [
                    'name' => $member['name'],
                    'first_name' => $member['first_name'],
                    'last_name' => $member['last_name'],
                    'bio' => $member['bio'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'show_in_website' => true,
                ]
            );

            $user->update([
                'name' => $member['name'],
                'first_name' => $member['first_name'],
                'last_name' => $member['last_name'],
                'bio' => $member['bio'],
                'show_in_website' => true,
            ]);

            foreach ($member['roles'] as $roleName) {
                if (!$user->hasRole($roleName)) {
                    $user->assignRole($roleName);
                }
            }
        }

        $this->command->info('Roles and Team Members seeded successfully in exact sequence!');
    }
}
