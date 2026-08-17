<?php

namespace Database\Seeders;

use App\Models\AutoFeeder;
use Illuminate\Database\Seeder;

class AutoFeederSeeder extends Seeder
{
    public function run(): void
    {
        $feeders = [
            [
                'name' => 'Feeder Station #1 - Sector 14 Park',
                'address' => 'Gate 2, Community Park, Sector 14, Gurgaon, Haryana 122001',
                'google_map_url' => 'https://www.google.com/maps/search/?api=1&query=Sector+14+Park+Gurgaon',
                'latitude' => 28.4735000,
                'longitude' => 77.0425000,
                'status' => 'active',
                'installed_date' => '2026-01-15',
                'sponsor_name' => 'Furrydom Guardians',
                'description' => '15kg auto kibble dispenser refilled daily at 8 PM by local volunteers.',
                'capacity_kg' => '15',
            ],
            [
                'name' => 'Feeder Station #2 - Cyber Hub Shelter Zone',
                'address' => 'Behind Tower 8, DLF Cyber City, Phase 2, Gurgaon, Haryana 122002',
                'google_map_url' => 'https://www.google.com/maps/search/?api=1&query=DLF+Cyber+City+Gurgaon',
                'latitude' => 28.4950000,
                'longitude' => 77.0880000,
                'status' => 'active',
                'installed_date' => '2026-03-10',
                'sponsor_name' => 'Rohit & Tech Feeders',
                'description' => 'Serves 25+ stray dogs in the tech park corridor with fresh water and dry kibble.',
                'capacity_kg' => '20',
            ],
            [
                'name' => 'Feeder Station #3 - Golf Course Road Spot',
                'address' => 'Near Sector 54 Metro Station, Golf Course Road, Gurgaon, Haryana 122003',
                'google_map_url' => 'https://www.google.com/maps/search/?api=1&query=Sector+54+Metro+Station+Gurgaon',
                'latitude' => 28.4410000,
                'longitude' => 77.1020000,
                'status' => 'active',
                'installed_date' => '2026-05-20',
                'sponsor_name' => 'Animal Lovers Care',
                'description' => 'Protected weatherproof dispenser maintained by neighborhood care team.',
                'capacity_kg' => '15',
            ],
            [
                'name' => 'Feeder Station #4 - MG Road Market Hub',
                'address' => 'Opposite MGF Metropolitan Mall, MG Road, Gurgaon, Haryana 122002',
                'google_map_url' => 'https://www.google.com/maps/search/?api=1&query=MG+Road+Gurgaon',
                'latitude' => 28.4795000,
                'longitude' => 77.0801000,
                'status' => 'active',
                'installed_date' => '2026-06-12',
                'sponsor_name' => 'City Pet Welfare',
                'description' => 'Solar-monitored high capacity feeder station installed near market precinct.',
                'capacity_kg' => '25',
            ],
            [
                'name' => 'Feeder Station #5 - Sohna Road Community Shelter',
                'address' => 'Near Subhash Chowk, Sohna Road, Sector 47, Gurgaon, Haryana 122018',
                'google_map_url' => 'https://www.google.com/maps/search/?api=1&query=Subhash+Chowk+Gurgaon',
                'latitude' => 28.4280000,
                'longitude' => 77.0390000,
                'status' => 'active',
                'installed_date' => '2026-07-04',
                'sponsor_name' => 'Gurgaon Dog Rescuers',
                'description' => 'Dual bowl feeder providing both clean drinking water and dry dog food daily.',
                'capacity_kg' => '20',
            ],
        ];

        foreach ($feeders as $feeder) {
            AutoFeeder::firstOrCreate(['name' => $feeder['name']], $feeder);
        }
    }
}
