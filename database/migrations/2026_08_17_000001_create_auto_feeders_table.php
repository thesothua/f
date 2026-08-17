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
        Schema::create('auto_feeders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->text('google_map_url')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('status')->default('active'); // active, maintenance, inactive
            $table->date('installed_date')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('capacity_kg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_feeders');
    }
};
