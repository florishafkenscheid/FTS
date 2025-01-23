<?php

namespace Database\Seeders;

use App\Models\Festival;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FestivalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Festival::factory()
            ->hasAttached(
                User::factory(5),
                []
            )
            ->count(10)
            ->create();
    }
}
