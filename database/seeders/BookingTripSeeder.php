<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::factory()
                ->hasAttached(
                    Trip::factory(3),
                    []
                )
                ->count(10)
                ->create();
    }
}
