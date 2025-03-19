<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all projects
        $projects = Project::all();
        
        // Ensure there are projects before seeding expenses
        if ($projects->isEmpty()) {
            $this->command->info('No projects found. Skipping expense seeding.');
            return;
        }
        
        // Loop through each project and create expenses
        $projects->each(function ($project) {
            Expense::factory(1)->create(['project_id' => $project->id]);
        });
    }
}
