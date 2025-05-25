<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create()->each(fn (User $user) => $user->posts()
            ->createMany(Post::factory(5)->make()->map->getAttributes()));
    }
}
