<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            UsersSeeder::class,
            ClientsSeeder::class,
            ProjectsSeeder::class,
            TasksSeeder::class,
            ReceiptsSeeder::class,
            CategoriesSeeder::class,
            SuppliersSeeder::class,
            ExpensesSeeder::class,
        ]);

    }
}
