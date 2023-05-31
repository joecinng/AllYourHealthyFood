<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Product::factory()->create([
                'name' => 'Organic Apples',
                'description' => 'Fresh and organic apples',
                'price' => 2.99,
                'weight' => 0.5,
                'image' => 'organic_apples.jpg',
                'stock' => 50,
                'ingredients' => 'Organic apples',
        ]);

        Product::factory()->create([
            'name' => 'Grass-Fed Ground Beef',
            'description' => 'Premium grass-fed ground beef',
            'price' => 9.99,
            'weight' => 1.0,
            'image' => 'grass_fed_beef.jpg',
            'stock' => 30,
            'ingredients' => 'Grass-fed beef',
        ]);

        Product::factory()->create([
            'name' => 'Organic Spinach',
            'description' => 'Fresh organic spinach leaves',
            'price' => 3.49,
            'weight' => 0.3,
            'image' => 'organic_spinach.jpg',
            'stock' => 40,
            'ingredients' => 'Organic spinach leaves',
        ]);

        Product::factory()->create([
            'name' => 'Free-Range Chicken Eggs',
            'description' => 'Free-range chicken eggs (pack of 12)',
            'price' => 4.99,
            'weight' => 0.6,
            'image' => 'free_range_eggs.jpg',
            'stock' => 20,
            'ingredients' => 'Free-range chicken eggs',
        ]);

        Product::factory()->create([
            'name' => 'Organic Whole Wheat Bread',
            'description' => 'Freshly baked organic whole wheat bread',
            'price' => 5.99,
            'weight' => 0.8,
            'image' => 'organic_bread.jpg',
            'stock' => 25,
            'ingredients' => 'Organic whole wheat flour, water, yeast, salt',
        ]);
            

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
