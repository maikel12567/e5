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
            ['name' => 'In production', 'description' => 'Order is In production', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shipped', 'description' => 'Order has been shipped', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delivered', 'description' => 'Order has been delivered', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Canceled', 'description' => 'Order has been canceled', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
