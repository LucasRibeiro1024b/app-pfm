<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Client;
use App\Models\Project;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
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
            "value" => fake()->randomFloat(2, 100, 9999),
            "payment_date" => fake()->boolean ? fake()->dateTimeBetween('-1 year', 'now') : null,
            "end_date" => fake()->dateTimeBetween('-1 year', 'now'),
            "quantity" => random_int(10, 100),
            "hours" => random_int(1, 50),            
            'project_id' => Project::pluck('id')->random(),
            'supplier_id' => Supplier::pluck('id')->random(),
            'category_id' => Category::pluck('id')->random(),
        ];
    }
}
