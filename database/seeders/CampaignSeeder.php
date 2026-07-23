<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campaigns = [
            [
                'title' => 'Buy an Animal Ambulance',
                'slug' => 'buy-animal-ambulance',
                'description' => 'We need a fully equipped animal ambulance to respond quickly to emergency street rescues, accidents, and trauma cases across the city. The vehicle will include stretchers, oxygen support, first-aid kits, and critical medical supplies.',
                'cover_image' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=800&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=600&q=80'
                ],
                'goal_amount' => 2500000.00,
                'raised_amount' => 1250000.00,
                'start_date' => now()->subDays(10),
                'end_date' => now()->addDays(60),
                'status' => 'Active',
            ],
            [
                'title' => 'Purchase Land for Animal Shelter',
                'slug' => 'purchase-land-animal-shelter',
                'description' => 'Our current rented shelter facility is at maximum capacity. We aim to purchase a dedicated 2-acre plot of land to build a permanent, safe sanctuary for older, disabled, and recovering animals. This will feature open play areas, quarantine zones, and an onsite clinic.',
                'cover_image' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=800&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1534361960057-19889db9621e?auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1596492784531-6e6eb5ea9993?auto=format&fit=crop&w=600&q=80'
                ],
                'goal_amount' => 5000000.00,
                'raised_amount' => 3800000.00,
                'start_date' => now()->subDays(30),
                'end_date' => now()->addDays(90),
                'status' => 'Active',
            ],
            [
                'title' => 'Animal Food Drive',
                'slug' => 'animal-food-drive',
                'description' => 'Daily feeding drives keep thousands of stray dogs and cats healthy and prevent starvation. Help us stock up on kibble, wet food, rice, and fresh vegetables for our community kitchens that feed over 500 street animals daily.',
                'cover_image' => 'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=800&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&fit=crop&w=600&q=80'
                ],
                'goal_amount' => 500000.00,
                'raised_amount' => 500000.00,
                'start_date' => now()->subDays(5),
                'end_date' => now()->addDays(20),
                'status' => 'Completed',
            ],
            [
                'title' => 'Medical Treatment Fund',
                'slug' => 'medical-treatment-fund',
                'description' => 'We treat over 100 outdoor animals every month for critical illnesses, skin infections, tumors, and broken bones. This fund is used directly to cover surgeries, diagnostics, boarding fee, and prescription medications.',
                'cover_image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=800&q=80',
                'gallery_images' => [],
                'goal_amount' => 1000000.00,
                'raised_amount' => 150000.00,
                'start_date' => now()->subDays(15),
                'end_date' => now()->addDays(45),
                'status' => 'Active',
            ]
        ];

        foreach ($campaigns as $campData) {
            Campaign::updateOrCreate(
                ['slug' => $campData['slug']],
                $campData
            );
        }
    }
}
