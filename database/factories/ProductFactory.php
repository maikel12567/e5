<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Review;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => fake()->word(),
            'description' => fake()->word(),
            'product_type' => fake()->numberBetween(1, 4),
            'material' => fake()->word(),
            'production_time' => fake()->randomElement(['1-3 days', '1-2 weeks', '2-4 weeks', '4-6 weeks']), // Random selection from array
            'complexity' => fake()->word(),
            'sustainability' => fake()->word(),
            'unique_properties' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 500),
            'image' => 'https://source.unsplash.com/random/640x480?sig=' . fake()->randomNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

