<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();

        foreach ($categories as $category) {
            // Create 3-5 products per category
            $productCount = rand(3, 5);
            
            for ($i = 0; $i < $productCount; $i++) {
                $product = \App\Models\Product::create([
                    'category_id' => $category->id,
                    'name' => $this->generateEnglishProductName($category->name),
                    'slug' => fake()->slug(),
                    'description' => $this->generateEnglishDescription($category->name),
                    'sku' => strtoupper(fake()->bothify('PROD-' . $category->id . '-####')),
                    'price' => fake()->randomFloat(2, 10, 1000),
                    'discount_price' => fake()->optional(0.3)->randomFloat(2, 5, 200),
                    'stock' => fake()->numberBetween(0, 100),
                    'status' => 'active',
                    'featured' => fake()->boolean(20),
                    'weight' => fake()->optional()->randomFloat(2, 0.1, 10),
                    'dimensions' => fake()->optional()->randomElement(['10x5x2', '15x8x3', '20x12x4']),
                    'brand' => fake()->optional()->company(),
                    'tags' => fake()->optional()->words(3, false),
                ]);

                // Create 2-4 variants per product
                $variantCount = rand(2, 4);
                $variantNames = ['Standard Edition', 'Premium Edition', 'Pro Version', 'Deluxe Package', 'Basic Model', 'Advanced Model'];
                for ($j = 0; $j < $variantCount; $j++) {
                    \App\Models\ProductVariant::create([
                        'product_id' => $product->id,
                        'name' => $variantNames[$j] ?? 'Standard Edition',
                        'sku' => strtoupper(fake()->bothify('VAR-' . $product->id . '-####')),
                        'price' => $product->price + fake()->randomFloat(2, -50, 100),
                        'stock' => fake()->numberBetween(0, 100),
                        'attributes' => [
                            'color' => fake()->colorName(),
                            'size' => fake()->randomElement(['S', 'M', 'L', 'XL']),
                        ],
                        'is_active' => true,
                    ]);
                }

                // Create 1-4 images per product using placeholder services
                $imageCount = rand(1, 4);
                $imageTypes = ['electronics', 'clothing', 'home', 'sports', 'books', 'toys'];
                $selectedType = $imageTypes[array_rand($imageTypes)];
                
                for ($k = 0; $k < $imageCount; $k++) {
                    \App\Models\ProductImage::create([
                        'product_id' => $product->id,
                        'path' => "https://picsum.photos/400/400?random=" . ($product->id * 10 + $k),
                        'alt_text' => $product->name . ' image ' . ($k + 1),
                        'sort_order' => $k,
                    ]);
                }
                
                // Set featured image for the product
                $product->update([
                    'featured_image' => "https://picsum.photos/400/400?random=" . ($product->id * 10)
                ]);
            }
        }

        // Create some reviews
        $products = \App\Models\Product::all();
        $users = \App\Models\User::whereHas('role', function ($query) {
            $query->where('name', 'customer');
        })->get();

        foreach ($products as $product) {
            $reviewCount = rand(0, 3);
            $selectedUsers = $users->random(min($reviewCount, $users->count()));
            
            foreach ($selectedUsers as $user) {
                \App\Models\Review::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'rating' => fake()->numberBetween(1, 5),
                    'comment' => fake()->paragraph(),
                    'is_approved' => true,
                ]);
            }
        }
    }

    /**
     * Generate English product names based on category
     */
    private function generateEnglishProductName($categoryName)
    {
        $productNames = [
            'Electronics' => [
                'Wireless Bluetooth Headphones',
                'Smart LED TV 55"',
                'Gaming Laptop Pro',
                'iPhone 15 Pro Max',
                'Samsung Galaxy S24',
                'MacBook Air M2',
                'Sony PlayStation 5',
                'Nintendo Switch OLED',
                'Apple Watch Series 9',
                'iPad Air 5th Gen',
                'DJI Mini Drone',
                'GoPro Hero 11',
                'Bose QuietComfort 45',
                'Samsung Galaxy Tab S9',
                'Microsoft Surface Pro 9'
            ],
            'Clothing' => [
                'Premium Cotton T-Shirt',
                'Denim Jacket Classic',
                'Leather Crossbody Bag',
                'Running Shoes Pro',
                'Wool Sweater Winter',
                'Slim Fit Jeans Blue',
                'Casual Hoodie Sweatshirt',
                'Formal Business Shirt',
                'Summer Dress Floral',
                'Athletic Shorts Sport',
                'Winter Coat Warm',
                'Polo Shirt Casual',
                'Sneakers Comfortable',
                'Dress Shirt Formal',
                'Jacket Waterproof'
            ],
            'Home & Garden' => [
                'Smart LED Light Bulb',
                'Kitchen Blender Pro',
                'Coffee Maker Automatic',
                'Garden Tool Set',
                'Bedding Set Cotton',
                'Kitchen Knife Set',
                'Vacuum Cleaner Robot',
                'Plant Pot Ceramic',
                'Table Lamp Modern',
                'Cushion Cover Decorative',
                'Wall Clock Elegant',
                'Storage Box Plastic',
                'Garden Hose Flexible',
                'Kitchen Scale Digital',
                'Bedside Table Wooden'
            ],
            'Sports & Outdoors' => [
                'Yoga Mat Premium',
                'Tennis Racket Pro',
                'Bicycle Mountain Bike',
                'Fishing Rod Complete',
                'Basketball Official Size',
                'Soccer Ball Professional',
                'Tent Camping 4-Person',
                'Hiking Boots Waterproof',
                'Golf Club Set Complete',
                'Swimming Goggles Clear',
                'Dumbbells Weight Set',
                'Treadmill Electric',
                'Skateboard Complete',
                'Badminton Racket Set',
                'Rock Climbing Harness'
            ],
            'Books & Media' => [
                'Bestselling Novel Fiction',
                'Cookbook Recipe Collection',
                'Self-Help Book Motivational',
                'Children\'s Story Book',
                'Business Strategy Guide',
                'Science Fiction Novel',
                'History Book Comprehensive',
                'Art Book Beautiful',
                'Travel Guide Complete',
                'Poetry Collection Classic',
                'Biography Inspiring',
                'Mystery Thriller Novel',
                'Educational Textbook',
                'Comic Book Collection',
                'Magazine Subscription'
            ],
            'Toys & Games' => [
                'Building Blocks Set',
                'Board Game Family',
                'Remote Control Car',
                'Puzzle 1000 Pieces',
                'Doll House Complete',
                'Action Figure Collectible',
                'Educational Toy STEM',
                'Art Supplies Kit',
                'Outdoor Play Equipment',
                'Video Game Console',
                'Plush Toy Cute',
                'Science Kit Discovery',
                'Musical Instrument Toy',
                'Construction Set Creative',
                'Memory Card Game'
            ]
        ];

        $categoryKey = ucfirst(strtolower($categoryName));
        $names = $productNames[$categoryKey] ?? $productNames['Electronics'];
        
        return $names[array_rand($names)];
    }

    /**
     * Generate English product descriptions based on category
     */
    private function generateEnglishDescription($categoryName)
    {
        $descriptions = [
            'Electronics' => [
                'Experience cutting-edge technology with this premium electronic device. Featuring advanced features, sleek design, and exceptional performance. Perfect for both personal and professional use. Built with high-quality materials and backed by our comprehensive warranty.',
                'Discover the future of technology with this innovative electronic product. Designed for maximum efficiency and user convenience. Includes the latest features and connectivity options. Ideal for tech enthusiasts and professionals alike.',
                'Upgrade your digital lifestyle with this state-of-the-art electronic device. Offering superior performance, elegant design, and intuitive user interface. Compatible with all major platforms and devices. A must-have for modern living.'
            ],
            'Clothing' => [
                'Elevate your style with this premium clothing item. Crafted from high-quality materials for ultimate comfort and durability. Features a modern design that suits any occasion. Available in various sizes and colors to match your preferences.',
                'Experience comfort and style with this carefully designed clothing piece. Made from breathable, sustainable materials that feel great against your skin. Perfect for everyday wear or special occasions. Easy to care for and long-lasting.',
                'Make a statement with this fashionable clothing item. Combining contemporary design with exceptional quality. Versatile enough for casual and formal settings. Designed to provide both comfort and style for the modern individual.'
            ],
            'Home & Garden' => [
                'Transform your living space with this essential home and garden product. Designed for both functionality and aesthetic appeal. Made from durable materials that withstand daily use. Perfect for creating a comfortable and beautiful environment.',
                'Enhance your home with this practical and stylish product. Built to last with premium materials and thoughtful design. Easy to use and maintain, making it perfect for busy households. Adds both value and beauty to your space.',
                'Create the perfect atmosphere with this carefully crafted home and garden item. Combining practical functionality with elegant design. Suitable for various home styles and preferences. A great investment for your living space.'
            ],
            'Sports & Outdoors' => [
                'Take your fitness and outdoor activities to the next level with this professional-grade sports equipment. Designed for performance and durability. Suitable for beginners and experienced athletes alike. Built to withstand rigorous use and outdoor conditions.',
                'Experience the thrill of outdoor adventure with this high-quality sports and outdoor product. Engineered for maximum performance and safety. Perfect for various outdoor activities and sports. Durable construction ensures long-lasting use.',
                'Achieve your fitness goals with this premium sports and outdoor equipment. Designed with the latest technology for optimal performance. Suitable for all skill levels and various activities. A great investment for your active lifestyle.'
            ],
            'Books & Media' => [
                'Immerse yourself in knowledge and entertainment with this carefully selected book or media product. Written by experts and designed to educate, inspire, or entertain. Perfect for personal growth and learning. A valuable addition to any collection.',
                'Expand your horizons with this engaging book or media item. Featuring compelling content that captivates readers and viewers. Suitable for all ages and interests. A great way to learn, relax, or be entertained.',
                'Discover new worlds and ideas with this exceptional book or media product. Carefully crafted to provide meaningful content and experiences. Perfect for personal development and enjoyment. A must-have for any library or collection.'
            ],
            'Toys & Games' => [
                'Spark creativity and imagination with this engaging toy or game. Designed to entertain and educate children of all ages. Made from safe, durable materials that parents can trust. Perfect for family bonding and learning experiences.',
                'Create lasting memories with this fun and educational toy or game. Encourages learning through play and social interaction. Built to last with high-quality materials. Suitable for various age groups and skill levels.',
                'Foster development and entertainment with this carefully designed toy or game. Combines fun with educational value. Safe and durable for extended play. Perfect for individual or group activities.'
            ]
        ];

        $categoryKey = ucfirst(strtolower($categoryName));
        $descArray = $descriptions[$categoryKey] ?? $descriptions['Electronics'];
        
        return $descArray[array_rand($descArray)];
    }
}
