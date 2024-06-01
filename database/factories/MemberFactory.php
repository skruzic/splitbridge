<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'surname' => fake()->lastName(),
            'name' => fake()->firstName(),
            'email' => fake()->safeEmail(),
            'crobridge' => fake()->randomNumber(5, true),
        ];
    }
}
