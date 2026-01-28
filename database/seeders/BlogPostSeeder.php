<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have a user
        $user = User::first() ?? User::factory()->create();

        $posts = [
            [
                'title' => 'Top 10 Benefits of Cycling',
                'slug' => 'top-10-benefits-of-cycling',
                'content' => "Cycling is not just a mode of transport; it's a way of life. Here are the top 10 health benefits of cycling everyday...",
                'image' => 'images/blog/1.jpeg',
            ],
            [
                'title' => 'How to Choose the Right Bike',
                'slug' => 'how-to-choose-the-right-bike',
                'content' => "With so many options available, choosing the right bike can be overwhelming. In this guide, we break down the different types...",
                'image' => 'images/blog/2.jpeg',
            ],
            [
                'title' => 'Maintenance Tips for Your E-Bike',
                'slug' => 'maintenance-tips-for-your-e-bike',
                'content' => "Electric bikes require specific care. Learn how to maintain your battery and motor to ensure longevity...",
                'image' => 'images/blog/3.jpeg',
            ],
            [
                'title' => 'Best Cycling Routes in Riyadh',
                'slug' => 'best-cycling-routes-in-riyadh',
                'content' => "Discover the hidden gems and best paths for cyclists in the capital city of Riyadh...",
                'image' => 'images/blog/4.jpeg',
            ],
            [
                'title' => 'Cycling Safety Gear Checklist',
                'slug' => 'cycling-safety-gear-checklist',
                'content' => "Safety first! Here is a comprehensive checklist of all the gear you need before hitting the road...",
                'image' => 'images/blog/5.jpeg',
            ],
            [
                'title' => 'The Future of Urban Mobility',
                'slug' => 'the-future-of-urban-mobility',
                'content' => "How electric bikes and scooters are reshaping our cities and reducing carbon footprints...",
                'image' => 'images/blog/6.jpeg',
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create([
                'title' => $post['title'],
                'slug' => $post['slug'],
                'content' => $post['content'],
                'image' => $post['image'],
                'user_id' => $user->id,
            ]);
        }
    }
}
