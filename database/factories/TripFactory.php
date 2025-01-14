<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;
use App\Models\Bus;
use App\Models\Festival;
use App\Models\Trip;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    protected $model = Trip::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(),
            'bus_id' => Bus::factory(),
            'festival_id' => Festival::factory(),
            'departure_from' => fake()->city(),
            'departure_scheduled_at' => fake()->dateTimeInInterval('-1 week', '+1 days'),
            'destination' => fake()->city(),
            'arrival_scheduled_at' => fake()->dateTimeInInterval('-5 days', '+6 days'),
        ];
    }
}
