<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Independent tables first
        $this->call([
            DestinationSeeder::class,
            CustomerSeeder::class,
            CurrencySeeder::class,
            GuideSeeder::class,
        ]);

        // Tables with foreign keys
        $this->call([
            TourPackageSeeder::class,    // Depends on destinations
            BookingSeeder::class,        // Depends on customers, packages, currencies
            GuideAssignmentSeeder::class, // Depends on bookings, guides
            ItinerarySeeder::class,      // Depends on bookings
            ReviewSeeder::class,         // Depends on bookings
        ]);
    }
}
