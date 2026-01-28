<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Electric Bikes (category_id: 1) - 5 Images
            [
                'category_id' => 1,
                'name' => 'City Cruiser Electric',
                'slug' => 'city-cruiser-electric',
                'description' => 'A comfortable electric bike designed for city commuting with a powerful motor and long-lasting battery.',
                'price' => 1270.00,
                'discount_price' => 1199.00,
                'stock' => 15,
                'rating' => 4.7,
                'image' => 'images/Electric Bikes/1.jpeg',
                'is_featured' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Parkwood E-Pro',
                'slug' => 'parkwood-e-pro',
                'description' => 'Premium electric bike with advanced smart features, GPS tracking, and anti-theft system.',
                'price' => 1500.00,
                'discount_price' => null,
                'stock' => 20,
                'rating' => 4.9,
                'image' => 'images/Electric Bikes/2.jpeg',
                'is_featured' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Vega Low-Step Assist',
                'slug' => 'vega-low-step-assist',
                'description' => 'Easy-entry frame with smooth pedal assist, perfect for seniors and casual riders.',
                'price' => 805.00,
                'discount_price' => 749.00,
                'stock' => 12,
                'rating' => 4.6,
                'image' => 'images/Electric Bikes/3.jpeg',
                'is_featured' => false,
            ],
            [
                'category_id' => 1,
                'name' => 'Volt X200',
                'slug' => 'volt-x200',
                'description' => 'High-speed electric bike for thrill-seekers, capable of reaching 45 km/h.',
                'price' => 1850.00,
                'discount_price' => null,
                'stock' => 8,
                'rating' => 4.8,
                'image' => 'images/Electric Bikes/4.jpeg',
                'is_featured' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'EcoRide Commuter',
                'slug' => 'ecoride-commuter',
                'description' => 'Eco-friendly electric bike made with sustainable materials.',
                'price' => 950.00,
                'discount_price' => 899.00,
                'stock' => 25,
                'rating' => 4.5,
                'image' => 'images/Electric Bikes/5.jpeg',
                'is_featured' => false,
            ],

            // Folding Bikes (category_id: 5) - 2 Images
            [
                'category_id' => 5,
                'name' => 'CompactFold Pro',
                'slug' => 'compactfold-pro',
                'description' => 'Ultra-compact folding bike that fits under your desk or in a car trunk.',
                'price' => 450.00,
                'discount_price' => 399.00,
                'stock' => 35,
                'rating' => 4.5,
                'image' => 'images/Folding Bikes/1.jpeg',
                'is_featured' => false,
            ],
            [
                'category_id' => 5,
                'name' => 'Metro Folder X',
                'slug' => 'metro-folder-x',
                'description' => 'Lightweight aluminum folding bike designed for the urban traveler.',
                'price' => 520.00,
                'discount_price' => null,
                'stock' => 45,
                'rating' => 4.4,
                'image' => 'images/Folding Bikes/2.jpeg',
                'is_featured' => false,
            ],

            // Hybrid Bikes (category_id: 6) - 2 Images
            [
                'category_id' => 6,
                'name' => 'Urban Hybrid 2.0',
                'slug' => 'urban-hybrid-2-0',
                'description' => 'The perfect mix between a road bike and a mountain bike for versatile riding.',
                'price' => 699.00,
                'discount_price' => 650.00,
                'stock' => 22,
                'rating' => 4.7,
                'image' => 'images/Hybrid Bikes/1.jpeg',
                'is_featured' => true,
            ],
            [
                'category_id' => 6,
                'name' => 'CrossCity Explorer',
                'slug' => 'crosscity-explorer',
                'description' => 'Durable hybrid bike ready for potholes and gravel paths alike.',
                'price' => 725.00,
                'discount_price' => null,
                'stock' => 28,
                'rating' => 4.6,
                'image' => 'images/Hybrid Bikes/2.jpeg',
                'is_featured' => false,
            ],

            // Kids Bikes (category_id: 4) - 2 Images
            [
                'category_id' => 4,
                'name' => 'Junior Racer',
                'slug' => 'junior-racer',
                'description' => 'Safe and fun bike with training wheels for kids aged 4-6.',
                'price' => 149.00,
                'discount_price' => 129.00,
                'stock' => 50,
                'rating' => 4.8,
                'image' => 'images/Kids Bikes/1.jpeg',
                'is_featured' => false,
            ],
            [
                'category_id' => 4,
                'name' => 'Space Explorer 20"',
                'slug' => 'space-explorer-20',
                'description' => 'Cool themed bike for adventurous kids aged 7-10.',
                'price' => 199.00,
                'discount_price' => null,
                'stock' => 60,
                'rating' => 4.9,
                'image' => 'images/Kids Bikes/2.jpeg',
                'is_featured' => true,
            ],

            // Mountain Bikes (category_id: 2) - 3 Images
            [
                'category_id' => 2,
                'name' => 'Trail Blazer 500',
                'slug' => 'trail-blazer-500',
                'description' => 'Entry-level mountain bike with front suspension for light trails.',
                'price' => 550.00,
                'discount_price' => 499.00,
                'stock' => 10,
                'rating' => 4.5,
                'image' => 'images/Mountain Bikes/1.jpeg',
                'is_featured' => false,
            ],
            [
                'category_id' => 2,
                'name' => 'Rock Hopper Pro',
                'slug' => 'rock-hopper-pro',
                'description' => 'Professional hardtail mountain bike for technical terrain.',
                'price' => 1200.00,
                'discount_price' => null,
                'stock' => 25,
                'rating' => 4.8,
                'image' => 'images/Mountain Bikes/2.jpeg',
                'is_featured' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Summit Seeker',
                'slug' => 'summit-seeker',
                'description' => 'Full-suspension mountain bike for downhill riding.',
                'price' => 2500.00,
                'discount_price' => 2300.00,
                'stock' => 5,
                'rating' => 5.0,
                'image' => 'images/Mountain Bikes/3.jpeg',
                'is_featured' => true,
            ],

            // Road Bikes (category_id: 3) - 3 Images
            [
                'category_id' => 3,
                'name' => 'Speedster Carbon',
                'slug' => 'speedster-carbon',
                'description' => 'Full carbon fiber road bike for racing enthusiasts.',
                'price' => 2200.00,
                'discount_price' => 1999.00,
                'stock' => 8,
                'rating' => 4.9,
                'image' => 'images/Road Bikes/1.jpeg',
                'is_featured' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Endurance SL',
                'slug' => 'endurance-sl',
                'description' => 'Comfortable geometry for long-distance road riding.',
                'price' => 1650.00,
                'discount_price' => null,
                'stock' => 15,
                'rating' => 4.7,
                'image' => 'images/Road Bikes/2.jpeg',
                'is_featured' => false,
            ],
            [
                'category_id' => 3,
                'name' => 'Sprint Aero',
                'slug' => 'sprint-aero',
                'description' => 'Aerodynamic aluminum road bike for speed training.',
                'price' => 950.00,
                'discount_price' => 850.00,
                'stock' => 40,
                'rating' => 4.5,
                'image' => 'images/Road Bikes/3.jpeg',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
