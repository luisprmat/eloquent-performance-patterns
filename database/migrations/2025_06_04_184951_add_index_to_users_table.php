<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (config('database.default') === 'mysql') {
                $table->rawIndex("(date_format(birth_date, '%m-%d')), name", 'users_birthday_name_index');
            }

            if (config('database.default') === 'sqlite') {
                $table->rawIndex("(strftime('%m-%d', birth_date)), name", 'users_birthday_name_index');
            }

            if (config('database.default') === 'pgsql') {
                DB::unprepared('
                    create or replace function to_birthday(date timestamp)
                    returns text language sql immutable as
                    $f$ select to_char($1, \'MM-DD\') $f$
                ');

                $table->rawIndex('to_birthday(birth_date), name', 'users_birthday_name_index');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_birthday_name_index');
        });
    }
};
