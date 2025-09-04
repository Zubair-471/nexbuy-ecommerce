<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics', 'description' => 'Latest electronic gadgets and devices'],
            ['name' => 'Clothing', 'slug' => 'clothing', 'description' => 'Fashion and apparel for all ages'],
            ['name' => 'Home & Garden', 'slug' => 'home-garden', 'description' => 'Home improvement and garden supplies'],
            ['name' => 'Books', 'slug' => 'books', 'description' => 'Books, magazines, and educational materials'],
            ['name' => 'Sports', 'slug' => 'sports', 'description' => 'Sports equipment and fitness gear'],
            ['name' => 'Toys & Games', 'slug' => 'toys-games', 'description' => 'Toys, games, and entertainment'],
            ['name' => 'Health & Beauty', 'slug' => 'health-beauty', 'description' => 'Health and beauty products'],
            ['name' => 'Automotive', 'slug' => 'automotive', 'description' => 'Automotive parts and accessories'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::firstOrCreate(['slug' => $category['slug']], $category);
        }

        // Create some subcategories
        $electronics = \App\Models\Category::where('slug', 'electronics')->first();
        $subcategories = [
            ['name' => 'Smartphones', 'slug' => 'smartphones', 'description' => 'Latest smartphones and mobile devices'],
            ['name' => 'Laptops', 'slug' => 'laptops', 'description' => 'Laptops and computers'],
            ['name' => 'Tablets', 'slug' => 'tablets', 'description' => 'Tablets and iPads'],
        ];

        foreach ($subcategories as $subcategory) {
            \App\Models\Category::firstOrCreate(
                ['slug' => $subcategory['slug']], 
                array_merge($subcategory, ['parent_id' => $electronics->id])
            );
        }
    }
}
