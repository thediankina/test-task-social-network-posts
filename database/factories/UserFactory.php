<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * @inheritdoc
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'login' => fake()->userName(),
            'password' => fake()->password(),
        ];
    }
}
