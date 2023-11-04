<?php

namespace Database\Factories;

use App\Models\User;
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
        return [

            // Create a post made by a random user with random contents
            'title' => fake()->sentence(1),
            'body' => fake()->paragraph(2),
            'image_path' => null,
            'user_id' => fake()->numberBetween(1, (User::get()->count())) // Random user

        ];
    }
}
