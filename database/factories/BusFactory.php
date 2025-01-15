<?php

namespace Database\Factories;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    protected $model = Bus::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_plate' => fake()->regexify('([A-Z]{1,3}|[0-9]{1,3})-([A-Z]{1,3}|[0-9]{1,3})-([A-Z]{1,3}|[0-9]{1,3})'),
            'time_since_maintenance' => fake()->unixTime(),
            'odometer' => fake()->numberBetween(0, 2000000),
            'max_capacity' => 35,
            'toilets' => fake()->numberBetween(0, 2),
            'brand' => fake()->company(),
            'passengers' => fake()->numberBetween(0, 35),
        ];
    }
}
