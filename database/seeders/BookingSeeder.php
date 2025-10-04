<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run()
    { 
        $bookings = [
            [
                'customer_id' => 1,
                'package_id' => 1,
                'booking_date' => '2025-10-01',
                'pax' => 2,
                'start_date' => '2025-12-15',
                'end_date' => '2025-12-20',
                'total_price' => 2400.00,
                'currency_id' => 1, // USD
            ],
            [
                'customer_id' => 2,
                'package_id' => 2,
                'booking_date' => '2025-10-02',
                'pax' => 4,
                'start_date' => '2025-11-10',
                'end_date' => '2025-11-17',
                'total_price' => 10000.00,
                'currency_id' => 2, // EUR
            ],
            [
                'customer_id' => 3,
                'package_id' => 3,
                'booking_date' => '2025-10-03',
                'pax' => 2,
                'start_date' => '2025-12-01',
                'end_date' => '2025-12-07',
                'total_price' => 3600.00,
                'currency_id' => 1, // USD
            ],
            [
                'customer_id' => 4,
                'package_id' => 4,
                'booking_date' => '2025-10-04',
                'pax' => 6,
                'start_date' => '2025-11-20',
                'end_date' => '2025-11-28',
                'total_price' => 13200.00,
                'currency_id' => 1, // USD
            ],
            [
                'customer_id' => 5,
                'package_id' => 5,
                'booking_date' => '2025-10-05',
                'pax' => 4,
                'start_date' => '2025-12-10',
                'end_date' => '2025-12-15',
                'total_price' => 44000.00,
                'currency_id' => 5, // AED
            ],
        ];

        foreach ($bookings as $booking) {
            DB::table('bookings')->insert($booking);
        }
    }
}