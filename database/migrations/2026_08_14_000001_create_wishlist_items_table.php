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
        Schema::create('wishlist_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('MEDICAL'); // MEDICAL, FOOD, HYGIENE, EQUIPMENT
            $table->string('price');
            $table->text('image_url')->nullable();
            $table->text('flipkart_url')->nullable();
            $table->text('amazon_url')->nullable();
            $table->integer('target_quantity')->default(50);
            $table->integer('received_quantity')->default(0);
            $table->boolean('is_urgent')->default(false);
            $table->boolean('show_progress_bar')->default(true);
            $table->boolean('is_active')->default(true);
            $table->integer('order_priority')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist_items');
    }
};
