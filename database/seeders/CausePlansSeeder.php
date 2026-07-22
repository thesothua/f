<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;

class CausePlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::query()->value('id');

        $causes = [
            [
                'title' => 'Animal Rescue',
                'description' => '24/7 rescue squads across Pune for injured & abandoned animals.',
                'category' => 'Animal Welfare',
                'sort_order' => 1,
                'image' => 'https://images.unsplash.com/photo-1601979031925-424e53b6caaa?w=400&q=80',
                'alt' => 'Man holding rescued dog on street',
                'goal_amount' => 25000,
                'status' => 'Active',
                'featured' => true,
            ],
            [
                'title' => 'Emergency Medical Care',
                'description' => 'On-ground triage, surgeries and post-op rehabilitation.',
                'category' => 'Medical Support',
                'sort_order' => 2,
                'image' => 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400&q=80',
                'alt' => 'Puppy receiving veterinary care',
                'goal_amount' => 32000,
                'status' => 'Active',
                'featured' => true,
            ],
            [
                'title' => 'Daily Feeding Drives',
                'description' => 'Hot meals for 1,200+ street animals every single day.',
                'category' => 'Feeding Programs',
                'sort_order' => 3,
                'image' => 'https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=400&q=80',
                'alt' => 'Woman feeding stray dogs on street',
                'goal_amount' => 18000,
                'status' => 'Active',
                'featured' => true,
            ],
            [
                'title' => 'Child Education Support',
                'description' => 'School kits, fees and tuition for underprivileged children.',
                'category' => 'Education',
                'sort_order' => 4,
                'image' => 'https://furydom-heartbeat-impact.lovable.app/assets/education-tQ1cevW9.jpg',
                'alt' => 'Children reading in a classroom',
                'goal_amount' => 25000,
                'status' => 'Active',
                'featured' => true,
            ],
            [
                'title' => 'Women Hygiene Programs',
                'description' => 'Sanitary kits and awareness across slum communities.',
                'category' => 'Women Empowerment',
                'sort_order' => 5,
                'image' => 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=400&q=80',
                'alt' => 'Woman receiving hygiene kit',
                'goal_amount' => 15000,
                'status' => 'Active',
                'featured' => false,
            ],
            [
                'title' => 'Ration Kit Distribution',
                'description' => 'Monthly grocery kits for families in extreme need.',
                'category' => 'Community Relief',
                'sort_order' => 6,
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=400&q=80',
                'alt' => 'Volunteers distributing food kits',
                'goal_amount' => 22000,
                'status' => 'Active',
                'featured' => false,
            ],
            [
                'title' => 'Animal Rehabilitation',
                'description' => 'Post-rescue care and rehoming for recovering animals.',
                'category' => 'Animal Welfare',
                'sort_order' => 7,
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=400&q=80',
                'alt' => 'Animal rehabilitation centre',
                'goal_amount' => 28000,
                'status' => 'Active',
                'featured' => false,
            ],
            [
                'title' => 'Community Development',
                'description' => 'Building resilient communities through sustainable initiatives.',
                'category' => 'Community Development',
                'sort_order' => 8,
                'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=400&q=80',
                'alt' => 'Community development initiative',
                'goal_amount' => 30000,
                'status' => 'Active',
                'featured' => false,
            ],
        ];

        foreach ($causes as $cause) {
            Plan::query()->updateOrCreate(
                [
                    'title' => $cause['title'],
                    'card_type' => 'cause',
                ],
                [
                    'card_type' => 'cause',
                    'description' => $cause['description'],
                    'category' => $cause['category'],
                    'sort_order' => $cause['sort_order'],
                    'image' => $cause['image'],
                    'alt' => $cause['alt'],
                    'goal_amount' => $cause['goal_amount'],
                    'status' => $cause['status'],
                    'featured' => $cause['featured'],
                    'user_id' => $userId,
                ]
            );
        }
    }
}
