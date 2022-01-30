<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->imageUrl(),
            'likes' => $this->faker->randomNumber(),
        ];
    }
    public function best()
    {
        return $this->state(fn(array $attributes) => [
            'likes' => 9999,
        ]);
    }
    public function worst()
    {
        return $this->state(fn(array $attributes) => [
            'likes' => 0,
        ]);
    }
}
