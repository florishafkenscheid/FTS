<?php

namespace Database\Seeders;

use App\Models\Festival;
use App\Models\FestivalNews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FestivalNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FestivalNews::factory()
                    ->count(10)
                    ->for(Festival::factory())
                    ->create();
    }
}
