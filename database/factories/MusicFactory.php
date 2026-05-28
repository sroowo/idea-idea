<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class MusicFactory extends Factory
{
    

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'song'=>(string) Str::random(10),
            'album'=>fake()->name(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    
}
