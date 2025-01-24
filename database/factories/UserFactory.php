<?php

namespace Database\Factories;

use App\Models\Festival;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => null,
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'rank' => 'user',
            'points' => fake()->numberBetween(0, 300),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Set the user as admin.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'rank' => 'admin',
        ]);
    }
    public function configure()
        {
            return $this->afterCreating(function (User $user) {
                if (User::count() > 1) {
                    // Get friends
                    $friends = User::where('users.id', '!=', $user->id)
                        ->inRandomOrder()
                        ->take(fake()->numberBetween(1, 5))
                        ->get();
                    
                    $user->friends()->attach($friends->pluck('id'));
                    
                    // Get all available festivals once
                    $allFestivals = Festival::where('start_at', '>', now())->get();
                    
                    // Only proceed with festival attachment if there are festivals available
                    if ($allFestivals->count() > 0) {
                        foreach ($friends as $friend) {
                            if ($friend->festivals()->count() === 0) {
                                $count = min($allFestivals->count(), fake()->numberBetween(1, 3));
                                $randomFestivals = $allFestivals->random($count);
                                $friend->festivals()->attach($randomFestivals->pluck('id'));
                            }
                        }
                        
                        // For the current user
                        $count = min($allFestivals->count(), fake()->numberBetween(1, 3));
                        $userFestivals = $allFestivals->random($count);
                        $user->festivals()->attach($userFestivals->pluck('id'));
                    }
                }
            });
        }
}
