<?php

namespace Database\Seeders;

use App\Models\Volunteer;
use Illuminate\Database\Seeder;

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
                'reason'      => 'I have a 2-wheeler and weekend availability to help rescue stray animals in need.',
                'status'      => 'Approved',
                'admin_notes' => 'Verified phone number and weekend availability.',
            ],
            [
                'full_name'   => 'Priya Patel',
                'email'       => 'priya.patel@example.com',
                'phone'       => '+91 98123 45678',
                'city'        => 'Mumbai',
                'role'        => 'event',
                'reason'      => 'Passionate about organizing adoption drives and community awareness workshops.',
                'status'      => 'Pending',
                'admin_notes' => null,
            ],
            [
                'full_name'   => 'Rohan Mehta',
                'email'       => 'rohan.mehta@example.com',
                'phone'       => '+91 97654 32109',
                'city'        => 'Pune',
                'role'        => 'social',
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
                'reason'      => 'Corporate communications lead looking to connect NGO with CSR initiatives.',
                'status'      => 'Pending',
                'admin_notes' => null,
            ],
        ];

        foreach ($volunteers as $v) {
            Volunteer::updateOrCreate(
                ['email' => $v['email']],
                $v
            );
        }
    }
}
