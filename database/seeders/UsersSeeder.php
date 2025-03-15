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
            'type' => 'partner',
            'value_hour' => 100
        ]);

        $types = ['partner', 'consultant', 'financier', 'intern'];
        foreach ($types as $type) {
            User::factory()->create([
                'type' => $type,
            ]);
        }

        User::factory(10)->create();
    }
}
