<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first();
        $adminId = $admin ? $admin->id : null;

        $blogs = [
            [
                'title' => '10 Ways to Help Stray Animals in Your Neighborhood',
                'slug' => '10-ways-help-stray-animals-neighborhood',
                'author' => 'Dr. Rohan Sharma',
                'category' => 'Animal Welfare',
                'tags' => ['Stray Animals', 'Animal Rescue', 'Community'],
                'excerpt' => 'Discover simple yet impactful ways you can support street animals, from providing fresh water to setting up temporary shelters.',
                'content' => '<h3>1. Provide Fresh Water and Food</h3><p>Water is essential, especially during scorching summers. Place clean earthen bowls filled with water in shaded spots outside your gate and replenish them daily.</p><h3>2. Build Temporary Shelters</h3><p>During heavy rains or severe winters, strays look for warm, dry spots. You can build simple, low-cost rain shelters using discarded plastic boxes, tarps, and old blankets.</p><h3>3. Coordinate Vaccinations</h3><p>Ensuring local dogs are vaccinated against rabies protects both the animals and your human neighbors. Work with local vets or NGOs to organize local vaccination schedules.</p><h3>4. Report Injured Animals</h3><p>If you see a dog or cat with wounds, skin disease, or limping, call a local animal rescue group immediately instead of ignoring them. Timely intervention saves lives.',
                'status' => 'Published',
                'featured_image' => [
                    'url' => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=800&q=80',
                    'alt' => 'Happy dog on street'
                ],
                'user_id' => $adminId,
            ],
            [
                'title' => 'Understanding Animal Rescue: What Happens After a Rescue Call',
                'slug' => 'understanding-animal-rescue-what-happens-after-call',
                'author' => 'Priya Patel',
                'category' => 'Rescue Stories',
                'tags' => ['Rescue Operations', 'Rehabilitation', 'Behind the Scenes'],
                'excerpt' => 'Take a behind-the-scenes look at our rescue operations and learn about the rehabilitation journey of an injured animal.',
                'content' => '<h3>Phase 1: The Emergency Call & Dispatch</h3><p>Our helpline receives dozens of calls daily. Once verified, our ambulance team is dispatched with capture nets, cages, and emergency medical kits to safely secure the injured animal.</p><h3>Phase 2: Veterinary Assessment</h3><p>Upon arrival at the clinic, the rescue animal receives immediate treatment. This includes wound dressing, pain relief injections, blood tests, and X-rays if fractures are suspected.</p><h3>Phase 3: Rest & Rehabilitation</h3><p>Recovery takes time. Animals are housed in quarantine or general wards depending on their illness. They receive nutritious meals, medicine, and socialization from volunteers to help rebuild their trust in humans.</p><h3>Phase 4: Release or Adoption</h3><p>Once fully recovered, street animals are released back to their original territories as mandated by animal protection laws, while disabled or highly vulnerable animals are put up for adoption.',
                'status' => 'Published',
                'featured_image' => [
                    'url' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&fit=crop&w=800&q=80',
                    'alt' => 'Rescued puppy receiving treatment'
                ],
                'user_id' => $adminId,
            ],
            [
                'title' => 'Why Daily Feeding Drives Matter for Street Dogs',
                'slug' => 'why-daily-feeding-drives-matter-street-dogs',
                'author' => 'Aman Sen',
                'category' => 'Daily Feeding',
                'tags' => ['Feeding Drives', 'Street Dogs', 'Dog Care'],
                'excerpt' => 'Daily feeding drives do more than just fill bellies. They build trust, reduce aggression, and help monitor the health of street dogs.',
                'content' => '<h3>Beyond Just Nutrition</h3><p>Feeding street dogs regularly helps calm their survival instinct. When animals know they do not have to fight for scraps of food in garbage piles, dog fights and territorial aggression decrease dramatically.</p><h3>Community Vaccination & Health Checks</h3><p>Feeding times are the perfect window to check on an animal’s health. Volunteers can spot new injuries, monitor pregnant dogs, and administer oral medications (like deworming or tick treatment) hidden inside the food.</p><h3>Connecting Humans and Strays</h3><p>Regular feeding drives foster a sense of friendship between local residents and street animals. This reduces complaints and builds a more compassionate community that watches out for their four-legged neighbors.',
                'status' => 'Published',
                'featured_image' => [
                    'url' => 'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?auto=format&fit=crop&w=800&q=80',
                    'alt' => 'Feeding a street dog'
                ],
                'user_id' => $adminId,
            ]
        ];

        foreach ($blogs as $blogData) {
            Blog::updateOrCreate(
                ['slug' => $blogData['slug']],
                $blogData
            );
        }
    }
}
