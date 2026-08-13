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
        Schema::create('contribution_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contribution_id')->constrained('contributions')->cascadeOnDelete();
            $table->string('company_name');
            $table->string('company_website')->nullable();
            $table->string('gst_number')->nullable();
            $table->enum('frequency', ['one_time', 'monthly', 'quarterly', 'annually']);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('next_due_date')->nullable();
            $table->enum('schedule_status', ['active', 'paused', 'completed', 'cancelled'])->default('active');
            $table->text('csr_agreement_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contribution_schedules');
    }
};
