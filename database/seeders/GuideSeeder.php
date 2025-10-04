<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuideSeeder extends Seeder
{
    public function run()
    {
        $guides = [
            [
                'name' => 'Made Wijaya',
                'phone' => '+62-812-3456-7890',
                'language' => 'Indonesian, English',
                'rating' => 4.8,
            ],
            [
                'name' => 'Kenji Yamamoto',
                'phone' => '+81-90-1234-5678',
                'language' => 'Japanese, English',
                'rating' => 4.9,
            ],
            [
                'name' => 'Pierre Dubois',
                'phone' => '+33-6-12-34-56-78',
                'language' => 'French, English',
                'rating' => 4.7,
            ],
            [
                'name' => 'Carlos Rodriguez',
                'phone' => '+51-987-654-321',
                'language' => 'Spanish, English',
                'rating' => 4.6,
            ],
            [
                'name' => 'Ahmed Al-Sayed',
                'phone' => '+971-50-123-4567',
                'language' => 'Arabic, English',
                'rating' => 4.8,
            ],
        ];

        foreach ($guides as $guide) {
            DB::table('guides')->insert($guide);
        }
    }
}