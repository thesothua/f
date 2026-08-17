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
            if (!Schema::hasColumn('donations', 'new_feeder_name')) {
                $table->string('new_feeder_name')->nullable()->after('auto_feeder_id');
            }
            if (!Schema::hasColumn('donations', 'new_feeder_address')) {
                $table->text('new_feeder_address')->nullable()->after('new_feeder_name');
            }
        });

        Schema::table('recurring_subscriptions', function (Blueprint $table) {
            if (!Schema::hasColumn('recurring_subscriptions', 'new_feeder_name')) {
                $table->string('new_feeder_name')->nullable()->after('auto_feeder_id');
            }
            if (!Schema::hasColumn('recurring_subscriptions', 'new_feeder_address')) {
                $table->text('new_feeder_address')->nullable()->after('new_feeder_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            if (Schema::hasColumn('donations', 'new_feeder_name')) {
                $table->dropColumn(['new_feeder_name', 'new_feeder_address']);
            }
        });

        Schema::table('recurring_subscriptions', function (Blueprint $table) {
            if (Schema::hasColumn('recurring_subscriptions', 'new_feeder_name')) {
                $table->dropColumn(['new_feeder_name', 'new_feeder_address']);
            }
        });
    }
};
