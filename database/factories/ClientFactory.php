<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->lastName,
            'first_name' => fake()->firstName,
            'address' => fake()->address,
            'phone' => fake()->phoneNumber(),
            'bdate' => fake()->date('Y-m-d', '2000-01-01'),
            'bio' => fake()->paragraph(8)
        ];
    }
}
