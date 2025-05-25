<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(250)->create();

        Feature::factory()->count(60)->create()->each(function (Feature $feature) use ($users) {
            $feature->comments()->createMany(
                Comment::factory()->count(rand(1, 50))->make()->each(function (Comment $comment) use ($users) {
                    $comment->user_id = $users->random()->id;
                })->toArray()
            );
        });
    }
}
