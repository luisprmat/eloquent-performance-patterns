<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(100)->has(Post::factory()->count(5))->create();

        Post::find(5)->update([
            'title' => $title = 'Information about foxes from wikipedia.',
            'slug' => str($title)->slug(),
            'body' => 'Foxes are small to medium-sized, omnivorous mammals belonging to several genera of the family Canidae. Foxes have a flattened skull, upright triangular ears, a pointed, slightly upturned snout, and a long bushy tail (or brush).',
        ]);

        Post::find(10)->update([
            'title' => $title = 'A sentence that contains all of the letters of the alphabet.',
            'slug' => str($title)->slug(),
            'body' => 'The quick brown fox jumps over the lazy dog.',
        ]);

        Post::find(15)->update([
            'title' => $title = 'Fox and the Hound',
            'slug' => str($title)->slug(),
            'body' => "Copper, you're my very best friend.\n\nAnd you're mine too, Tod.\n\nAnd we'll always be friends forever, won't we?\n\nYeah. Forever.",
        ]);
    }
}
