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
        return [
            'title' => $this->faker->sentence(),
            'short_description' => $this->faker->text(),
            'description' => $this->faker->text(),
            'picture' => $this->faker->image(),
            'user_id' => $this->faker->numberBetween(1, 20),
            'published_at' => $this->faker->date(),
        ];
    }
}
