<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = substr(fake()->sentence(), 0, -1);

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'body' => fake()->paragraphs(10, true),
            'published_at' => fake()->dateTimeThisDecade(),
        ];
    }
}
