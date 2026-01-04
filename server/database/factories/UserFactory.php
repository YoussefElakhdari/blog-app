<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // default password
            'phone' => $this->faker->optional()->phoneNumber(),
            'date_of_birth' => $this->faker->optional()->date(),
            'bio' => $this->faker->optional()->paragraph(),
            'profile_pic' => 'default.png',
            'role' => 'user',
        ];
    }
}
