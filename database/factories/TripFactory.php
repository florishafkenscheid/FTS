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
        $departureDate = fake()->dateTimeBetween('now', '+2 months');
        $arrivalDate = (clone $departureDate)->modify('+1 day');
        
        return [
            'bus_id' => Bus::factory(),
            'festival_id' => Festival::factory(),
            'departure_from' => fake()->randomElement(['Amsterdam', 'Rotterdam', 'Utrecht', 'The Hague', 'Eindhoven']),
            'departure_scheduled_at' => $departureDate,
            'destination' => fake()->randomElement(['Lowlands', 'Pinkpop', 'Rock Werchter', 'Tomorrowland', 'Defqon.1']),
            'arrival_scheduled_at' => $arrivalDate,
            'price' => fake()->numberBetween(25, 75),
        ];
    }
}
