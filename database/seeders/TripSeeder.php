<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Festival;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::factory()
            ->count(10)
            ->has(Festival::factory())
            ->has(Bus::factory())
            ->create();
    }
}
