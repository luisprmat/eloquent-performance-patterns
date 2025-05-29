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
        if (config('database.default') !== 'mysql') {
            Schema::table('users', function (Blueprint $table) {
                $table->string('first_name_normalized')->virtualAs("regexp_replace(first_name, '[^A-Za-z0-9]', '')")->index();
                $table->dropIndex(['first_name']);
                $table->string('last_name_normalized')->virtualAs("regexp_replace(last_name, '[^A-Za-z0-9]', '')")->index();
                $table->dropIndex(['last_name']);
            });
        } else {
            Schema::table('users', function (Blueprint $table) {
                $table->string('first_name_normalized')->after('first_name')->virtualAs("regexp_replace(first_name, '[^A-Za-z0-9]', '')")->index();
                $table->dropIndex(['first_name']);
                $table->string('last_name_normalized')->after('last_name')->virtualAs("regexp_replace(last_name, '[^A-Za-z0-9]', '')")->index();
                $table->dropIndex(['last_name']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->index('last_name');
            $table->dropColumn('last_name_normalized');
            $table->index('first_name');
            $table->dropColumn('first_name_normalized');
        });
    }
};
