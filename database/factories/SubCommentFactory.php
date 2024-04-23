<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubComment>
 */
class SubCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10), // Assuming you have users with IDs 1 to 10
            'comment_id' => fake()->numberBetween(1, 20), // Assuming you have comments with IDs 1 to 20
            'body' => fake()->paragraph(),
            'created_at' => fake()->dateTimeThisYear(),
        ];
    }
}
