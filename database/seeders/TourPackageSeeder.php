<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourPackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'destination_id' => 1, // Bali
                'title' => 'Bali Cultural Experience',
                'max_pax' => 15,
                'description' => 'Explore the rich cultural heritage of Bali through temple visits, traditional dances, and local cuisine',
                'base_price' => 1200.00,
                'duration_days' => 5,
                'status' => 'active',
            ],
            [
                'destination_id' => 2, // Tokyo
                'title' => 'Tokyo Technology & Tradition Tour',
                'max_pax' => 12,
                'description' => 'Experience the contrast of ancient temples and modern technology in Tokyo',
                'base_price' => 2500.00,
                'duration_days' => 7,
                'status' => 'active',
            ],
            [
                'destination_id' => 3, // Paris
                'title' => 'Romantic Paris Getaway',
                'max_pax' => 10,
                'description' => 'Discover the most romantic spots in Paris including Eiffel Tower and Seine River cruise',
                'base_price' => 1800.00,
                'duration_days' => 6,
                'status' => 'active',
            ],
            [
                'destination_id' => 4, // Machu Picchu
                'title' => 'Inca Trail Adventure',
                'max_pax' => 8,
                'description' => 'Trek the famous Inca Trail to Machu Picchu with expert guides',
                'base_price' => 2200.00,
                'duration_days' => 8,
                'status' => 'active',
            ],
            [
                'destination_id' => 5, // Dubai
                'title' => 'Dubai Luxury Experience',
                'max_pax' => 20,
                'description' => 'Experience the luxury and opulence of Dubai with desert safari and city tours',
                'base_price' => 3000.00,
                'duration_days' => 5,
                'status' => 'active',
            ],
        ];

        foreach ($packages as $package) {
            DB::table('tour_packages')->insert($package);
        }
    }
}