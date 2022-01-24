<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'country_id' => fn () => Country::factory()->create(),
            'name' => $this->faker->word(),
            'body' => $this->faker->sentence(10),
            'published_at' => null,
        ];
    }
}
