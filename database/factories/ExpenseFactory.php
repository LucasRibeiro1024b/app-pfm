<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Client;
use App\Models\Project;
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
            "value" => fake()->randomNumber(4),
            "payment_date" => fake()->date(),
            "quantity" => random_int(10, 100),
            "hours" => random_int(1, 50),            
            'project_id' => Project::pluck('id')->random(),
            'supplier_id' => 1,
            'category_id' => Category::pluck('id')->random(),
        ];
    }
}
