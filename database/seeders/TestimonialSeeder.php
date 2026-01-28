<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'customer_name' => 'Mohammed Al-Saud',
                'rating' => 5,
                'comment' => 'Excellent service and high quality bikes! I bought the electric bike and it exceeded my expectations. Highly recommended!',
                'image' => 'testimonials/customer1.jpg',
            ],
            [
                'customer_name' => 'Fatima Ahmed',
                'rating' => 5,
                'comment' => 'Amazing experience from start to finish. The staff was very helpful in choosing the perfect bike for my needs.',
                'image' => 'testimonials/customer2.jpg',
            ],
            [
                'customer_name' => 'Abdullah Hassan',
                'rating' => 4,
                'comment' => 'Great selection of bikes and competitive prices. Delivery was fast and the bike arrived in perfect condition.',
                'image' => 'testimonials/customer3.jpg',
            ],
            [
                'customer_name' => 'Nora Ibrahim',
                'rating' => 5,
                'comment' => 'I love my new mountain bike! The quality is outstanding and it handles perfectly on all terrains.',
                'image' => 'testimonials/customer4.jpg',
            ],
            [
                'customer_name' => 'Khalid Omar',
                'rating' => 5,
                'comment' => 'Best bike shop in town! Professional service, fair prices, and amazing products. Will definitely buy again.',
                'image' => 'testimonials/customer5.jpg',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
