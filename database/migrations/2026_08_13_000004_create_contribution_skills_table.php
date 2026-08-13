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
        Schema::create('contribution_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contribution_id')->constrained('contributions')->cascadeOnDelete();
            $table->string('skill_category');
            $table->string('specific_skills')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->enum('service_mode', ['remote', 'on_site', 'hybrid'])->default('remote');
            $table->string('availability_days')->nullable();
            $table->integer('estimated_hours_per_week')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contribution_skills');
    }
};
