<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItinerarySeeder extends Seeder
{
    public function run()
    {
        $itineraries = [
            // Bali itinerary
            [
                'booking_id' => 1,
                'day_number' => 1,
                'activity_description' => 'Arrival and welcome dinner at traditional Balinese restaurant',
            ],
            [
                'booking_id' => 1,
                'day_number' => 2,
                'activity_description' => 'Visit to Ubud temples and rice terraces',
            ],
            // Tokyo itinerary
            [
                'booking_id' => 2,
                'day_number' => 1,
                'activity_description' => 'Tokyo Tower visit and Sushi making class',
            ],
            [
                'booking_id' => 2,
                'day_number' => 2,
                'activity_description' => 'Exploring Akihabara and traditional tea ceremony',
            ],
            // Paris itinerary
            [
                'booking_id' => 3,
                'day_number' => 1,
                'activity_description' => 'Eiffel Tower visit and Seine River cruise',
            ],
            [
                'booking_id' => 3,
                'day_number' => 2,
                'activity_description' => 'Louvre Museum tour and wine tasting',
            ],
            // Machu Picchu itinerary
            [
                'booking_id' => 4,
                'day_number' => 1,
                'activity_description' => 'Start of Inca Trail trek from KM 82',
            ],
            [
                'booking_id' => 4,
                'day_number' => 2,
                'activity_description' => 'Trek to Dead Woman\'s Pass, camping at high altitude',
            ],
            // Dubai itinerary
            [
                'booking_id' => 5,
                'day_number' => 1,
                'activity_description' => 'Burj Khalifa visit and Dubai Mall shopping',
            ],
            [
                'booking_id' => 5,
                'day_number' => 2,
                'activity_description' => 'Desert safari and traditional Bedouin dinner',
            ],
        ];

        foreach ($itineraries as $itinerary) {
            DB::table('itineraries')->insert($itinerary);
        }
    }
}