<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Constants\UserRoles;
use App\Models\User;
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

        $types = [UserRoles::PARTNER, UserRoles::CONSULTANT, UserRoles::FINANCIER, UserRoles::INTERN];
        foreach ($types as $type) {
            User::factory()->create([
                'type' => $type,
            ]);
        }

        User::factory(10)->create();

    }
}
