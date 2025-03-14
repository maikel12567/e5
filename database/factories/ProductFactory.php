<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'product_type' => fake()->numberBetween(1, 4), 
            'material' => fake()->randomElement(['Wood', 'Metal', 'Plastic', 'Glass']),
            'production_time' => fake()->randomElement(['1 week', '2 weeks', '1 month']),
            'complexity' => fake()->randomElement(['Low', 'Medium', 'High']),
            'sustainability' => fake()->randomElement(['Eco-friendly', 'Recyclable', 'Biodegradable']),
            'unique_properties' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'review_id' => null, 
            'image' => fake()->imageUrl(640, 480, 'products'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
