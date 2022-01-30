<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => fn () => User::factory()->create(),
            'name' => $this->faker->words(10, true),
            'price' => $this->faker->randomFloat(10, 50000),
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
