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
            Schema::table('companies', function (Blueprint $table) {
                $table->string('name_normalized')->virtualAs("regexp_replace(name, '[^A-Za-z0-9]', '')")->index();
                $table->dropIndex(['name']);
            });
        } else {
            Schema::table('companies', function (Blueprint $table) {
                $table->string('name_normalized')->after('name')->virtualAs("regexp_replace(name, '[^A-Za-z0-9]', '')")->index();
                $table->dropIndex(['name']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->index('name');
            $table->dropColumn('name_normalized');
        });
    }
};
