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
                'status' => 'pending',
                'assigned_date' => '2025-12-15',
            ],
            [
                'booking_id' => 2,
                'guide_id' => 2,
                'status' => 'pending',
                'assigned_date' => '2025-11-10',
            ],
            [
                'booking_id' => 3,
                'guide_id' => 3,
                'status' => 'pending',
                'assigned_date' => '2025-12-01',
            ]
        ];

        foreach ($assignments as $assignment) {
            DB::table('guide_assignments')->insert($assignment);
        }
    }
}
