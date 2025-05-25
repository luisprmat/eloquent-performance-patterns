<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class LastLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Refactor to cache last login in users table
        $users = User::all();

        foreach ($users as $user) {
            $user->update([
                'last_login_id' => $user->logins()->latest()->first()->id,
            ]);
        }
    }
}
