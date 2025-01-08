<?php

namespace Database\Factories;

use App\Models\Festival;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festival>
 */
class FestivalFactory extends Factory
{
    protected $model = Festival::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'start_at' => fake()-> dateTimeInInterval('-1 week', '+1 day'),
            'end_at' => fake()->dateTimeInInterval('-1 week', '+6 days'),
            'attendees' => fake()->random_int(),
        ];
    }
}
