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
                'title' => 'Empowering Youth: The Importance of Educational Support',
                'slug' => 'empowering-youth-importance-of-educational-support',
                'author' => 'Aman Sen',
                'category' => 'Child Development',
                'tags' => ['Education', 'Youth Empowerment', 'Community'],
                'excerpt' => 'Education is the key to unlocking a child\'s potential. Discover how our child development pillar provides necessary resources to underprivileged students.',
                'content' => '<h3>Providing School Supplies</h3><p>Many children drop out simply because they lack basic school supplies. By providing notebooks, pens, and backpacks, we ensure they are fully equipped to learn.</p><h3>Mentorship Programs</h3><p>Education goes beyond textbooks. Our volunteer mentorship programs help students navigate career choices and build vital life skills for their future.</p><h3>Creating Safe Learning Spaces</h3><p>A conducive learning environment is crucial. We work with local communities to establish safe, well-lit spaces where children can study after school hours.',
                'status' => 'Published',
                'featured_image' => [
                    'url' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=800&q=80',
                    'alt' => 'Children learning in school'
                ],
                'user_id' => $adminId,
            ],
            [
                'title' => 'Eradicating Hunger: Our Weekly Dry Ration Drives',
                'slug' => 'eradicating-hunger-weekly-dry-ration-drives',
                'author' => 'Neha Gupta',
                'category' => 'Hunger Relief',
                'tags' => ['Food Drives', 'Community Support', 'Hunger Free'],
                'excerpt' => 'See the impact of our weekly food distribution campaigns, designed to provide sustainable nutrition to families facing acute food insecurity.',
                'content' => '<h3>Identifying Vulnerable Families</h3><p>We work closely with community leaders to identify households that struggle with daily sustenance, ensuring our relief efforts reach those who need it most.</p><h3>Nutritional Dry Ration Kits</h3><p>Each family receives a carefully curated kit containing rice, lentils, cooking oil, and essential spices designed to sustain a family of four for up to two weeks.</p><h3>Emergency Cooked Meals</h3><p>In addition to dry rations, our emergency kitchens provide hot, freshly cooked meals to individuals facing immediate hunger on the streets.',
                'status' => 'Published',
                'featured_image' => [
                    'url' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=800&q=80',
                    'alt' => 'Food distribution drive'
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
