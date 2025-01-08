<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Festival;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FestivalNews>
 */
class FestivalNewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'festival_id' => Festival::factory(),
            'content' => fake()->paragraph(),
            'title' => fake()->domainWord(),
        ];
    }
}
