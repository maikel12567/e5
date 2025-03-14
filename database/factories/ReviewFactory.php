<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3), 
            'description' => fake()->paragraph(), 
            'score' => fake()->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}