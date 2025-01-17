<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Festival;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Test user
        $testUser = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rank' => 'vip',
            'points' => 9999,
        ]);

        // Create bookings and festivals for the test user
        $bookings = Booking::factory()->count(3)->make();
        $festivals = Festival::factory()->count(3)->create();
        $friends = User::factory()->count(5)->create();

        $testUser->bookings()->saveMany($bookings);
        $testUser->festivals()->attach($festivals->pluck('id')->toArray());
        $testUser->friends()->attach($friends->pluck('id')->toArray());


        // General use
        User::factory()
            ->count(20)
            ->has(Booking::factory()->count(3))
            ->has(Festival::factory()->count(3))
            ->create();
    }
}
