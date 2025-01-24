<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $trips = Trip::all();

        foreach ($users as $user) {
            $bookingCount = fake()->numberBetween(1, 3);
            
            for ($i = 0; $i < $bookingCount; $i++) {
                $booking = Booking::factory()
                    ->for($user)
                    ->create();

                // Attach a random trip to the booking
                $booking->trips()->attach($trips->random()->id);
            }
        }
    }
}
