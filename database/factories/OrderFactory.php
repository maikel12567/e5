<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), 
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            'order_status' => fake()->numberBetween(1, 4), 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
