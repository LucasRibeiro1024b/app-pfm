<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company,
            'email' => fake()->unique()->safeEmail,
            'personType' => true,
            'personTypeCode' => fake()->numerify('##############'),
            'address' => fake()->address,
            'telephone' => fake()->phoneNumber,
            'user_id' => null,
        ];
    }
}
