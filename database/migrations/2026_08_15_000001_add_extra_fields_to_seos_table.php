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
        Schema::table('seos', function (Blueprint $table) {
            $table->string('og_image')->nullable()->after('keywords');
            $table->string('canonical_url')->nullable()->after('og_image');
            $table->boolean('no_index')->default(false)->after('canonical_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seos', function (Blueprint $table) {
            $table->dropColumn(['og_image', 'canonical_url', 'no_index']);
        });
    }
};
