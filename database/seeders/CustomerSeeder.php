<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@email.com',
                'phone' => '+1-555-123-4567',
                'nationality' => 'American',
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria.garcia@email.com',
                'phone' => '+34-666-789-012',
                'nationality' => 'Spanish',
            ],
            [
                'name' => 'Yuki Tanaka',
                'email' => 'yuki.tanaka@email.com',
                'phone' => '+81-90-1234-5678',
                'nationality' => 'Japanese',
            ],
            [
                'name' => 'Sophie Martin',
                'email' => 'sophie.martin@email.com',
                'phone' => '+33-6-12-34-56-78',
                'nationality' => 'French',
            ],
            [
                'name' => 'Ali Mohammed',
                'email' => 'ali.mohammed@email.com',
                'phone' => '+971-50-123-4567',
                'nationality' => 'Emirati',
            ],
        ];

        foreach ($customers as $customer) {
            DB::table('customers')->insert($customer);
        }
    }
}