<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class SongsFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [

            'name' => fake()->sentence(2),

        ];

    }

    /**
     * Indicate that the model's email address should be unverified.
     */

}
