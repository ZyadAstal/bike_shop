<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electric Bikes',
                'slug' => 'electric-bikes',
                'description' => 'Modern electric bikes with powerful motors and long-lasting batteries.',
                'image' => 'images/Electric Bikes/1.jpeg',
            ],
            [
                'name' => 'Mountain Bikes',
                'slug' => 'mountain-bikes',
                'description' => 'Durable mountain bikes built for rough terrain and adventures.',
                'image' => 'images/Mountain Bikes/1.jpeg',
            ],
            [
                'name' => 'Road Bikes',
                'slug' => 'road-bikes',
                'description' => 'Lightweight road bikes designed for speed and performance.',
                'image' => 'images/Road Bikes/1.jpeg',
            ],
            [
                'name' => 'Kids Bikes',
                'slug' => 'kids-bikes',
                'description' => 'Safe and fun bikes specially designed for children.',
                'image' => 'images/Kids Bikes/1.jpeg',
            ],
            [
                'name' => 'Folding Bikes',
                'slug' => 'folding-bikes',
                'description' => 'Compact and portable folding bikes perfect for commuters.',
                'image' => 'images/Folding Bikes/1.jpeg',
            ],
            [
                'name' => 'Hybrid Bikes',
                'slug' => 'hybrid-bikes',
                'description' => 'Versatile hybrid bikes combining features of road and mountain bikes.',
                'image' => 'images/Hybrid Bikes/1.jpeg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
