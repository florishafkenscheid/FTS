<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Festival;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(20)
            ->has(Booking::factory())
            ->has(Festival::factory())
            ->create();
    }
}