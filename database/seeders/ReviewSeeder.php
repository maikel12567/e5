<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::factory()->count(100)->create();
    }
}
