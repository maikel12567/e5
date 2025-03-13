<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->insert([
            ['name' => 'Pending', 'description' => 'Order is awaiting processing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shipped', 'description' => 'Order has been shipped', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delivered', 'description' => 'Order has been delivered', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
