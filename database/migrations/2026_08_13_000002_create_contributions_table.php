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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('reference_number')->unique(); // e.g., FD-FOOD-2026-0001
            $table->enum('type', ['money', 'food', 'supplies', 'time', 'skills', 'services', 'business_csr']);
            $table->string('title');
            $table->text('description')->nullable();
            
            // Status tracking
            $table->enum('status', [
                'pending',
                'under_review',
                'approved',
                'contacted',
                'scheduled',
                'received',
                'completed',
                'rejected',
                'cancelled'
            ])->default('pending');

            // Linking to core entities
            $table->foreignId('campaign_id')->nullable()->constrained('campaigns')->nullOnDelete();
            $table->foreignId('rescue_case_id')->nullable()->constrained('rescue_cases')->nullOnDelete();
            $table->foreignId('volunteer_id')->nullable()->constrained('volunteers')->nullOnDelete();

            // Contributor Details
            $table->string('contributor_name');
            $table->string('contributor_email');
            $table->string('contributor_phone');
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('preferred_contact_method')->default('email');

            // Logistics & Scheduling
            $table->enum('fulfillment_method', ['pickup', 'drop_off', 'courier', 'digital', 'on_site', 'n_a'])->default('n_a');
            $table->date('preferred_date')->nullable();
            $table->string('preferred_time_slot')->nullable();
            
            // Privacy Preferences
            $table->boolean('is_anonymous')->default(false);
            $table->boolean('allow_public_display')->default(true);
            $table->boolean('can_contact')->default(true);

            // Admin Management Fields
            $table->text('admin_notes')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['type', 'status']);
            $table->index('contributor_email');
            $table->index('reference_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributions');
    }
};
