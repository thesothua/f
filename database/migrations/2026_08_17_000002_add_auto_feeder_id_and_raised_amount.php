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
        Schema::table('donations', function (Blueprint $table) {
            if (!Schema::hasColumn('donations', 'auto_feeder_id')) {
                $table->foreignId('auto_feeder_id')->nullable()->constrained('auto_feeders')->nullOnDelete();
            }
        });

        Schema::table('recurring_subscriptions', function (Blueprint $table) {
            if (!Schema::hasColumn('recurring_subscriptions', 'auto_feeder_id')) {
                $table->foreignId('auto_feeder_id')->nullable()->constrained('auto_feeders')->nullOnDelete();
            }
        });

        Schema::table('auto_feeders', function (Blueprint $table) {
            if (!Schema::hasColumn('auto_feeders', 'raised_amount')) {
                $table->decimal('raised_amount', 12, 2)->default(0)->after('capacity_kg');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            if (Schema::hasColumn('donations', 'auto_feeder_id')) {
                $table->dropForeign(['auto_feeder_id']);
                $table->dropColumn('auto_feeder_id');
            }
        });

        Schema::table('recurring_subscriptions', function (Blueprint $table) {
            if (Schema::hasColumn('recurring_subscriptions', 'auto_feeder_id')) {
                $table->dropForeign(['auto_feeder_id']);
                $table->dropColumn('auto_feeder_id');
            }
        });

        Schema::table('auto_feeders', function (Blueprint $table) {
            if (Schema::hasColumn('auto_feeders', 'raised_amount')) {
                $table->dropColumn('raised_amount');
            }
        });
    }
};
