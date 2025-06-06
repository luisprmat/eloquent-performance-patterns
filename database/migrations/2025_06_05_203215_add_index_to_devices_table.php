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
        Schema::table('devices', function (Blueprint $table) {
            if (config('database.default') === 'pgsql') {
                $table->rawIndex('(naturalsort(name))', 'name_sort_index');
            }

            if (config('database.default') === 'sqlite' || config('database.default') === 'mysql') {
                throw new \Exception('This index is not supported on SQLite or MySql.');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            if (config('database.default') === 'pgsql') {
                $table->dropIndex('name_sort_index');
            }

            if (config('database.default') === 'sqlite' || config('database.default') === 'mysql') {
                throw new \Exception('This is not supported on SQLite or MySql.');
            }
        });
    }
};
