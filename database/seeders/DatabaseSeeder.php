<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BookingSeeder;
use Database\Seeders\BusSeeder;
use Database\Seeders\FestivalSeeder;
use Database\Seeders\FestivalNewsSeeder;
use Database\Seeders\TripSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BusSeeder::class,
            UserSeeder::class,
            FestivalSeeder::class,
            BookingSeeder::class,
            FestivalNewsSeeder::class,
            TripSeeder::class,
        ]);
    }
}
