<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $volunteers = [
            [
                'full_name'   => 'Aarav Sharma',
                'email'       => 'aarav.sharma@example.com',
                'phone'       => '+91 98765 43210',
                'city'        => 'Pune',
                'role'        => 'rescue',
                'role_name'   => 'Rescue Volunteer',
                'reason'      => 'I have a 2-wheeler and weekend availability to help rescue stray animals in need.',
                'status'      => 'Approved',
                'admin_notes' => 'Verified phone number and weekend availability.',
            ],
            [
                'full_name'   => 'Rohan Mehta',
                'email'       => 'rohan.mehta@example.com',
                'phone'       => '+91 97654 32109',
                'city'        => 'Pune',
                'role'        => 'social',
                'role_name'   => 'Social Media Volunteer',
                'reason'      => 'Experienced photographer and video editor wanting to create reels for animal adoption.',
                'status'      => 'Approved',
                'admin_notes' => 'Assigned to social media video creation team.',
            ],
            [
                'full_name'   => 'Ananya Joshi',
                'email'       => 'ananya.j@example.com',
                'phone'       => '+91 95432 10987',
                'city'        => 'Delhi',
                'role'        => 'fundraising',
                'role_name'   => 'Fundraising Volunteer',
                'reason'      => 'Corporate communications lead looking to connect NGO with CSR initiatives.',
                'status'      => 'Approved',
                'admin_notes' => 'Corporate outreach lead.',
            ],
            [
                'full_name'   => 'Priya Patel',
                'email'       => 'priya.patel@example.com',
                'phone'       => '+91 98123 45678',
                'city'        => 'Mumbai',
                'role'        => 'event',
                'role_name'   => 'Event Volunteer',
                'reason'      => 'Passionate about organizing adoption drives and community awareness workshops.',
                'status'      => 'Pending',
                'admin_notes' => null,
            ],
        ];

        foreach ($volunteers as $v) {
            $roleName = $v['role_name'];
            unset($v['role_name']);

            $volunteer = Volunteer::updateOrCreate(
                ['email' => $v['email']],
                $v
            );

            if ($volunteer->status === 'Approved') {
                // Ensure role exists with is_volunteer = true
                Role::updateOrCreate(
                    ['name' => $roleName, 'guard_name' => 'api'],
                    ['is_volunteer' => true]
                );

                // Create/Update User account with volunteer role
                $parts = explode(' ', trim($v['full_name']), 2);
                $user = User::updateOrCreate(
                    ['email' => $v['email']],
                    [
                        'name' => $v['full_name'],
                        'first_name' => $parts[0] ?? '',
                        'last_name' => $parts[1] ?? '',
                        'phone' => $v['phone'],
                        'bio' => $v['reason'],
                        'password' => Hash::make('password'),
                        'show_in_website' => true,
                        'email_verified_at' => now(),
                    ]
                );

                if (!$user->hasRole($roleName)) {
                    $user->assignRole($roleName);
                }
            }
        }

        $this->command->info('Volunteer applications and Users seeded successfully!');
    }
}
