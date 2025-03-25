<?php

namespace Database\Seeders;

use App\Models\Receipt;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = Task::all();

        foreach ($tasks as $task) {
            Receipt::factory(1)->create([
                'title' => $task->title,
                'description' => $task->title,
                'value' => $task->value,
                'end_date' => $task->project->end_date,
                'project_id' => $task->project->id,
                'client_id' => $task->project->client_id
            ]);
        }
    }
}
