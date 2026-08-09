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
        $tableNames = config('permission.table_names');
        $rolesTable = $tableNames['roles'] ?? 'roles';

        Schema::table($rolesTable, function (Blueprint $table) use ($rolesTable) {
            if (!Schema::hasColumn($rolesTable, 'is_volunteer')) {
                $table->boolean('is_volunteer')->default(false)->after('allow_notification');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableNames = config('permission.table_names');
        $rolesTable = $tableNames['roles'] ?? 'roles';

        Schema::table($rolesTable, function (Blueprint $table) use ($rolesTable) {
            if (Schema::hasColumn($rolesTable, 'is_volunteer')) {
                $table->dropColumn('is_volunteer');
            }
        });
    }
};
