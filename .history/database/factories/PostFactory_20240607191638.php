<?php

namespace Database\Factories;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'user_id' => User::factory()->create()->id,
            'title' => $this->faker->text(50),
            'author' => $this->faker->name,
            'content' => $this->faker->text(200),
        ];
    }
}
