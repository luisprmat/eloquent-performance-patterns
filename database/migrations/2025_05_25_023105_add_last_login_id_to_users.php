<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('last_login_id')->after('remember_token')->nullable()->constrained('logins');
        });

        Artisan::call('db:seed', [
            '--class' => 'LastLoginSeeder',
        ]);

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('last_login_id')->after('remember_token')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('last_login_id');
        });
    }
};
