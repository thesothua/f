<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rescue_cases', function (Blueprint $table) {
            $table->json('clinic_details')->nullable();
            $table->json('recovery_details')->nullable();
            $table->json('adoption_details')->nullable();
            $table->json('release_details')->nullable();
            $table->json('deceased_details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rescue_cases', function (Blueprint $table) {
            $table->dropColumn([
                'clinic_details',
                'recovery_details',
                'adoption_details',
                'release_details',
                'deceased_details',
            ]);
        });
    }
};
