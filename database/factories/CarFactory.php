<?php

namespace Database\Factories;

use App\Models\Mechanic;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->word(),
            'mechanic_id' => fn () => Mechanic::factory()->create(),
        ];
    }
}
