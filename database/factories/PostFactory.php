<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() : array
    {
        return [
            'user_id' => fn () => User::factory()->create(),
            'title' => $this->faker->sentence(3),
            'body' => $this->faker->sentence(20),
            'published_at' => now(),
        ];
    }
}
