<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'JohnDoe',
                'email' => 'john@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'credit' => 100.50,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'JaneDoe',
                'email' => 'jane@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('securepass'),
                'credit' => 200.75,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
