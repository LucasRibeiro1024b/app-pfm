<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insertOrIgnore([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'type' => 0,
            'value_hour' => 100
        ]);

        $types = [1, 2, 3];
        foreach ($types as $type) {
            User::factory()->create([
                'type' => $type, // Explicitly set the type
            ]);
        }

        User::factory(10)->create();
    }
}
