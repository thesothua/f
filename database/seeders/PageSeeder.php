<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'description' => 'Homepage content and main website highlights.',
                'status' => 'published',
                'meta_title' => 'Furrydom India | All Lives Matter',
                'meta_description' => 'Dedicated to street animal rescue, medical care, feeding drives, and animal welfare across Pune and surrounding regions.',
                'meta_keywords' => 'animal rescue, furrydom, street dog help, donate animal welfare',
                'sort_order' => 1,
                'sections' => [
                    [
                        'section_key' => 'home_hero',
                        'section_type' => 'hero',
                        'title' => 'Every Life Deserves Love, Care & A Second Chance.',
                        'subtitle' => 'PUNE · MAHARASHTRA · EST. 2020',
                        'content' => [
                            'description' => 'We are dedicated to rescuing injured street animals, providing critical medical treatment, emergency assistance, and community feeding drives.',
                            'primary_cta_text' => 'Donate Now',
                            'primary_cta_link' => '/donate',
                            'secondary_cta_text' => 'Report Injured Animal',
                            'secondary_cta_link' => '/report-injured',
                        ],
                        'media_url' => 'https://images.unsplash.com/photo-1548767797-d8c844163c4c?auto=format&fit=crop&q=80&w=1200',
                        'is_active' => true,
                        'sort_order' => 1,
                    ],
                    [
                        'section_key' => 'home_pillars',
                        'section_type' => 'features',
                        'title' => 'What We Do',
                        'subtitle' => 'OUR CORE PILLARS',
                        'content' => [
                            'description' => 'Explore how Furrydom supports the community through active rescues, feeding, and medical care.',
                            'items' => [
                                [
                                    'title' => 'Emergency Animal Rescue',
                                    'description' => 'Immediate on-ground response for injured, abused, or sick street animals.',
                                    'icon' => 'FiHeart',
                                ],
                                [
                                    'title' => 'Daily Feeding Drives',
                                    'description' => 'Nutritious meal distribution to stray dogs and cats across city zones.',
                                    'icon' => 'FiSmile',
                                ],
                                [
                                    'title' => 'Medical Rehabilitation',
                                    'description' => 'Veterinary care, surgeries, vaccinations, and recovery foster homes.',
                                    'icon' => 'FiActivity',
                                ],
                            ],
                        ],
                        'is_active' => true,
                        'sort_order' => 2,
                    ],
                    [
                        'section_key' => 'home_stats',
                        'section_type' => 'stats',
                        'title' => 'Our Impact So Far',
                        'subtitle' => 'TRANSFORMING LIVES DAILY',
                        'content' => [
                            'stats' => [
                                ['label' => 'Rescues Conducted', 'value' => '1,200+'],
                                ['label' => 'Meals Served Monthly', 'value' => '25,000+'],
                                ['label' => 'Active Volunteers', 'value' => '150+'],
                                ['label' => 'Vaccinations Done', 'value' => '3,500+'],
                            ],
                        ],
                        'is_active' => true,
                        'sort_order' => 3,
                    ],
                ],
            ],
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'description' => 'Our story, mission, vision, and team details.',
                'status' => 'published',
                'meta_title' => 'About Us | Furrydom India',
                'meta_description' => 'Learn about Furrydom India mission, history, core values, and dedicated team.',
                'meta_keywords' => 'about furrydom, animal welfare ngo pune, stray rescue team',
                'sort_order' => 2,
                'sections' => [
                    [
                        'section_key' => 'about_hero',
                        'section_type' => 'hero',
                        'title' => 'Driven by Compassion, United for Animal Welfare.',
                        'subtitle' => 'OUR JOURNEY & MISSION',
                        'content' => [
                            'description' => 'Furrydom India was founded with a single mission: to ensure no street animal suffers without care, food, or medical attention.',
                        ],
                        'is_active' => true,
                        'sort_order' => 1,
                    ],
                ],
            ],
            [
                'title' => 'Donate',
                'slug' => 'donate',
                'description' => 'Donation page details and cause plans.',
                'status' => 'published',
                'meta_title' => 'Support Our Cause | Donate to Furrydom',
                'meta_description' => 'Your financial contributions directly fund medical care, rescue operations, and daily feeding drives.',
                'meta_keywords' => 'donate animal rescue, sponsor stray dog, furrydom donation',
                'sort_order' => 3,
                'sections' => [
                    [
                        'section_key' => 'donate_hero',
                        'section_type' => 'hero',
                        'title' => 'Fueling futures: every donation makes a difference.',
                        'subtitle' => 'MAKE AN IMPACT',
                        'content' => [
                            'description' => 'Choose a one-time or monthly donation plan to support our emergency rescues and street feeding programs.',
                        ],
                        'is_active' => true,
                        'sort_order' => 1,
                    ],
                ],
            ],
        ];

        foreach ($pages as $pageData) {
            $sections = $pageData['sections'] ?? [];
            unset($pageData['sections']);

            $page = Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );

            foreach ($sections as $secData) {
                PageSection::updateOrCreate(
                    [
                        'page_id' => $page->id,
                        'section_key' => $secData['section_key'],
                    ],
                    $secData
                );
            }
        }
    }
}
