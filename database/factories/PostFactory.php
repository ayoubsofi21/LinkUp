<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
                'user_id' => User::factory(),
                'content' => fake()->paragraph(3),
                'image' => 'https://picsum.photos/800/600?random=' . fake()->numberBetween(1, 1000),

        ];

    }
}
