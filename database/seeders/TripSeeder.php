<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Festival;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    public function run(): void
    {
        // Get all festivals
        $festivals = Festival::all();
        
        foreach ($festivals as $festival) {
            Trip::factory()
                ->count(rand(1, 3)) // Create 1-3 trips per festival
                ->for($festival)    // Associate with festival
                ->has(Bus::factory())
                ->create();
        }
    }
}
