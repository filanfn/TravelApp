<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $reviews = [
            [
                'booking_id' => 1,
                'comment' => 'Amazing experience in Bali! The cultural tours were enlightening and our guide was excellent.',
                'review_date' => '2025-12-21',
            ],
            [
                'booking_id' => 2,
                'comment' => 'Perfect blend of modern and traditional Japan. Highly recommended!',
                'review_date' => '2025-11-18',
            ],
            [
                'booking_id' => 3,
                'comment' => 'Paris was magical! The wine tasting and Seine cruise were highlights of our trip.',
                'review_date' => '2025-12-08',
            ],
            [
                'booking_id' => 4,
                'comment' => 'Challenging but rewarding trek to Machu Picchu. The guides were very professional.',
                'review_date' => '2025-11-29',
            ],
            [
                'booking_id' => 5,
                'comment' => 'Luxurious experience in Dubai. The desert safari was unforgettable!',
                'review_date' => '2025-12-16',
            ],
        ];

        foreach ($reviews as $review) {
            DB::table('reviews')->insert($review);
        }
    }
}