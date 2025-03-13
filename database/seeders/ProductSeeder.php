<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Laptop',
                'user_id' => 1, // Zorg dat user_id 1 bestaat in de users-tabel
                'description' => 'This laptop is amazing!',
                'product_type' => 1,
                'material' => 'Aluminum',
                'production_time' => '2 weeks',
                'complexity' => 'High',
                'sustainability' => 'Eco-friendly',
                'unique_properties' => 'Lightweight and powerful',
                'price' => 999.99,
                'review_id' => 1, // Zorg dat review_id 1 bestaat in de reviews-tabel of zet op null
                'image' => 'laptop.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'T-shirt',
                'user_id' => 2, // Zorg dat user_id 2 bestaat in de users-tabel
                'description' => 'This t-shirt is really comfortable.',
                'product_type' => 2,
                'material' => 'Cotton',
                'production_time' => '1 week',
                'complexity' => 'Low',
                'sustainability' => 'Organic materials',
                'unique_properties' => 'Breathable fabric',
                'price' => 19.99,
                'review_id' => 2, // Zorg dat review_id 2 bestaat in de reviews-tabel of zet op null
                'image' => 'tshirt.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
