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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('plan_id')->nullable()->constrained('plans')->nullOnDelete(); // Target cause
            $table->foreignId('subscription_id')->nullable()->constrained('recurring_subscriptions')->nullOnDelete(); // Links transaction to subscription
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('donor_phone')->nullable();
            $table->string('pan_number')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('INR');
            $table->string('status')->default('pending'); // pending, succeeded, failed
            $table->string('payment_gateway')->default('razorpay');
            $table->string('gateway_transaction_id')->nullable()->unique(); // Razorpay payment ID
            $table->string('gateway_order_id')->nullable()->unique(); // Razorpay order ID
            $table->string('receipt_url')->nullable();
            $table->boolean('anonymous')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
