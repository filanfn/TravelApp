<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuideAssignmentSeeder extends Seeder
{
    public function run()
    {
        $assignments = [
            [
                'booking_id' => 1,
                'guide_id' => 1,
                'assigned_date' => '2025-12-15',
            ],
            [
                'booking_id' => 2,
                'guide_id' => 2,
                'assigned_date' => '2025-11-10',
            ],
            [
                'booking_id' => 3,
                'guide_id' => 3,
                'assigned_date' => '2025-12-01',
            ],
            [
                'booking_id' => 4,
                'guide_id' => 4,
                'assigned_date' => '2025-11-20',
            ],
            [
                'booking_id' => 5,
                'guide_id' => 5,
                'assigned_date' => '2025-12-10',
            ],
        ];

        foreach ($assignments as $assignment) {
            DB::table('guide_assignments')->insert($assignment);
        }
    }
}