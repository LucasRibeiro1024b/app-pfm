<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(2),
            "description" => fake()->sentence(10),
            "value" => fake()->randomFloat(2, 10, 1000),
            "payment_date" => fake()->optional(0.5, null)->dateTimeBetween('-1 year', 'now'),
            "end_date" => fake()->dateTimeBetween('-1 year', 'now'),
            'client_id' => Client::pluck('id')->random(),
            'project_id' => Project::pluck('id')->random(),
        ];
    }
}
