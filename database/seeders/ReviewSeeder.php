<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'title' => 'Amazing Product',
                'description' => 'This product exceeded my expectations!',
                'score' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Good Quality',
                'description' => 'Really happy with this purchase.',
                'score' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
