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
        Schema::create('animal_reports', function (Blueprint $table) {
            $table->id();
            $table->string('reporter_name');
            $table->string('reporter_mobile');
            $table->string('reporter_email')->nullable();
            $table->string('animal_type');
            $table->string('approximate_age');
            $table->string('color');
            $table->string('gender')->nullable();
            $table->json('injuries');
            $table->text('address');
            $table->string('landmark')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('urgency');
            $table->text('description');
            $table->string('status')->default('pending'); // pending, accepted, rejected
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        Schema::create('rescue_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_number')->unique();
            $table->foreignId('animal_report_id')->nullable()->constrained('animal_reports')->onDelete('set null');
            $table->foreignId('rescuer_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('animal_type');
            $table->string('color');
            $table->string('gender')->nullable();
            $table->string('status')->default('dispatched'); // dispatched, admitted, in_treatment, recovered, released, adopted, deceased
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescue_cases');
        Schema::dropIfExists('animal_reports');
    }
};
