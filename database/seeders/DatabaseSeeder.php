<?php

namespace Database\Seeders;

use App\Models\Login;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(60)->has(Login::factory()->count(500))->create();
    }
}
