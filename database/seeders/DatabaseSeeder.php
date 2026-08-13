<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            VolunteerRoleSeeder::class,
            SuperAdminSeeder::class,
            PermissionSeeder::class,
            VolunteerSeeder::class,
            CausePlansSeeder::class,
            CampaignSeeder::class,
            BlogSeeder::class,
            SettingSeeder::class,
            WishlistItemSeeder::class,
        ]);
    }
}
