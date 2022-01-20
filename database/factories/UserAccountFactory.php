<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class UserAccountFactory extends Factory
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
            'qq' => $this->faker->numberBetween(100000, 999999999),
            'wechat' => $this->faker->word(),
            'weibo' => $this->faker->word(),
            'twitter' => $this->faker->word(),
            'facebook' => $this->faker->word(),
        ];
    }
}
