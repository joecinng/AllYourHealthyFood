<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(5),
            'price' => 10.00,
            'weight' => 5,
            'image' => 'image.png',
            'stock' => 100,
            'ingredients' => 'tomato, brocoli'
        ];
    }
}
