<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $currencies = [
            [
                'code' => 'USD',
                'exchange_rate' => 1.0000,
            ],
            [
                'code' => 'EUR',
                'exchange_rate' => 0.8500,
            ],
            [
                'code' => 'JPY',
                'exchange_rate' => 110.0000,
            ],
            [
                'code' => 'GBP',
                'exchange_rate' => 0.7300,
            ],
            [
                'code' => 'AED',
                'exchange_rate' => 3.6725,
            ],
        ];

        foreach ($currencies as $currency) {
            DB::table('currencies')->insert($currency);
        }
    }
}