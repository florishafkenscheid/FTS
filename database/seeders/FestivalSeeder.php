<?php

namespace Database\Seeders;

use App\Models\Festival;
use App\Models\FestivalNews;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Festival::factory()
                ->count(10)
                ->has(FestivalNews::factory(), 'news')
                ->has(Trip::factory())
                ->has(User::factory())
                ->create();
    }
}
