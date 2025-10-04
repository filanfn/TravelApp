<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    public function run()
    {
        $destinations = [
            [
                'name' => 'Bali',
                'country' => 'Indonesia',
                'description' => 'Beautiful island known for its forested volcanic mountains, iconic rice paddies, beaches and coral reefs',
            ],
            [
                'name' => 'Tokyo',
                'country' => 'Japan',
                'description' => 'Modern city with a perfect blend of traditional culture and cutting-edge technology',
            ],
            [
                'name' => 'Paris',
                'country' => 'France',
                'description' => 'City of Light famous for its art, culture, iconic architecture, and romantic ambiance',
            ],
            [
                'name' => 'Machu Picchu',
                'country' => 'Peru',
                'description' => 'Ancient Incan city set high in the Andes Mountains, known for its mysterious archaeological wonders',
            ],
            [
                'name' => 'Dubai',
                'country' => 'United Arab Emirates',
                'description' => 'Modern metropolis known for luxury shopping, ultramodern architecture, and vibrant nightlife',
            ],
        ];

        foreach ($destinations as $destination) {
            DB::table('destinations')->insert($destination);
        }
    }
}