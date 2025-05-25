<?php

namespace Database\Factories;

use App\Enums\FeatureActionEnum;
use App\Enums\FeatureStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->randomElement(FeatureActionEnum::class)->value.' '.fake()->words(rand(2, 5), true);

        return [
            'title' => $title,
            'status' => fake()->randomElement([
                FeatureStatus::REQUESTED->value,
                FeatureStatus::REQUESTED->value,
                FeatureStatus::REQUESTED->value,
                FeatureStatus::REQUESTED->value,
                FeatureStatus::REQUESTED->value,
                FeatureStatus::REQUESTED->value,
                FeatureStatus::REQUESTED->value,
                FeatureStatus::REQUESTED->value,
                FeatureStatus::REQUESTED->value,
                FeatureStatus::PLANNED->value,
                FeatureStatus::COMPLETED->value,
                FeatureStatus::COMPLETED->value,
            ]),
        ];
    }
}
