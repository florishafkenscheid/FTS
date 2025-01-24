<?php

namespace Database\Factories;

use App\Models\Festival;
use Carbon\Carbon;
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
        static $usedFestivals = [];
        
        $festivals = collect([
            ['Pinkpop', '06-21', 3],
            ['Rock Werchter', '07-04', 4],
            ['Tomorrowland', '07-19', 3],
            ['Lowlands', '08-16', 3],
            ['Defqon.1', '06-28', 3],
            ['Mysteryland', '08-23', 3],
            ['Down The Rabbit Hole', '07-05', 3],
            ['Awakenings', '06-29', 2],
        ])->filter(function($fest) use (&$usedFestivals) {
            if (count($usedFestivals) >= 8) $usedFestivals = [];
            return !in_array($fest[0], $usedFestivals);
        });
        
        $festival = $festivals->random();
        $usedFestivals[] = $festival[0];
        
        // Get a random festival and add a random year (2024 or 2025)
        $festival = $festivals->random();
        $year = fake()->randomElement([2024, 2025]);
        $startDate = Carbon::createFromFormat('m-d Y', $festival[1] . ' ' . $year);
        $endDate = $startDate->copy()->addDays($festival[2]);
        
        return [
            'name' => $festival[0],
            'description' => fake()->realText(200),
            'start_at' => $startDate,
            'end_at' => $endDate,
            'attendees' => fake()->numberBetween(5000, 60000),
            'email' => function (array $attributes) {
                return strtolower(str_replace(' ', '', $attributes['name'])) . '@festival.com';
            },
            'phone_number' => '+31' . fake()->numberBetween(600000000, 699999999),
        ];
    }
}
