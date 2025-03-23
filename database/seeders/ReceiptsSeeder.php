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
            Receipt::factory(15)->create([
                'value' => $task->value
            ]);
        }
    }
}
