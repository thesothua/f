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
            'Founder & Director' => ['allow_notification' => false, 'is_volunteer' => false, 'role_description' => 'Organization Founder & Director'],
            'Director for Operations (COO)' => ['allow_notification' => false, 'is_volunteer' => false, 'role_description' => 'Operations & Strategy Lead'],
            'Rescue & Field Operations Head' => ['allow_notification' => false, 'is_volunteer' => false, 'role_description' => 'Rescue & Medical Lead'],
            'Social Media & Content Manager' => ['allow_notification' => false, 'is_volunteer' => false, 'role_description' => 'Media & Digital Lead'],
            'Technical Advisor' => ['allow_notification' => false, 'is_volunteer' => false, 'role_description' => 'Technology & Platform Advisor'],
            'Visitor' => ['allow_notification' => false, 'is_volunteer' => false, 'role_description' => 'Default role for registered website visitors.'],
        ];

        foreach ($rolesData as $roleName => $attributes) {
            Role::updateOrCreate(
                ['name' => $roleName, 'guard_name' => 'api'],
                $attributes
            );
        }

        // 2. Team Members / Users Seeding Data (in exact sequence)
        $teamMembers = [
            [
                'name' => 'Amit Kumar',
                'email' => 'amit.kumar@furrydom.org',
                'bio' => 'Founder & Director at Furrydom India, working towards animal welfare, rescue missions, sustainable feeding initiatives, and child development programs since 2020.',
                'roles' => ['Founder & Director'],
            ],
            [
                'name' => 'Divya Kumariya',
                'email' => 'divya.kumariya@furrydom.org',
                'bio' => 'Managing fundraising operations and donor engagement initiatives across Maharashtra and Karnataka.',
                'roles' => ['Director for Operations (COO)'],
            ],
            [
                'name' => 'Jatin Jadhav',
                'email' => 'jatin.jadhav@furrydom.org',
                'bio' => 'Managing rescue operations, emergency response, treatment coordination, and animal adoption initiatives.',
                'roles' => ['Rescue & Field Operations Head'],
            ],
            [
                'name' => 'Sakshi More',
                'email' => 'sakshi.more@furrydom.org',
                'bio' => 'Managing social media content, supporter engagement, and digital outreach initiatives.',
                'roles' => ['Social Media & Content Manager'],
            ],
            [
                'name' => 'Praveen Suthar',
                'email' => config('mail.from.address', 'thesothua@gmail.com'),
                'bio' => 'Providing technical guidance and managing Furrydom India’s website, digital platforms, and technology initiatives to support the organization’s operations, outreach, and mission.',
                'roles' => ['Technical Advisor'],
                'show_in_website' => true,
            ],
        ];

        foreach ($teamMembers as $member) {
            $user = User::updateOrCreate(
                ['email' => $member['email']],
                [
                    'name' => $member['name'],
                    'bio' => $member['bio'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'show_in_website' => $member['show_in_website'] ?? true,
                ]
            );

            foreach ($member['roles'] as $roleName) {
                if (!$user->hasRole($roleName)) {
                    $user->assignRole($roleName);
                }
            }
        }

        // 3. Visitor Users Seeding Data
        $visitorUsers = [
            [
                'name' => 'Rahul Verma',
                'email' => 'rahul.verma@example.com',
                'bio' => 'Animal lover and regular website visitor.',
                'roles' => ['Visitor'],
            ],
            [
                'name' => 'Priya Patel',
                'email' => 'priya.patel@example.com',
                'bio' => 'Community supporter interested in animal welfare initiatives.',
                'roles' => ['Visitor'],
            ],
        ];

        foreach ($visitorUsers as $visitor) {
            $user = User::updateOrCreate(
                ['email' => $visitor['email']],
                [
                    'name' => $visitor['name'],
                    'bio' => $visitor['bio'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'show_in_website' => false,
                ]
            );

            foreach ($visitor['roles'] as $roleName) {
                if (!$user->hasRole($roleName)) {
                    $user->assignRole($roleName);
                }
            }
        }

        $this->command->info('Roles, Team Members, and Visitors seeded successfully in exact sequence!');
    }
}
