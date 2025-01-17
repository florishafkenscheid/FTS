<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    /**
     * Festivals that belong to the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function festivals() {
        return $this->belongsToMany(Festival::class);
    }
    
    /**
     * Get the first upcoming festival for the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function upcomingFestival() 
    {
        return $this->festivals()
            ->where('start_at', '>', '1970-01-01 00:00:00') // change date to now() when ready.
            ->orderBy('start_at', 'asc');
    }

    /**
     * Bookings that belong to the user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    /**
     * Friends that belong to the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function friends() {
        return $this->belongsToMany(User::class, 'user_user', 'user_id', 'friend_id');
    }

    /**
     * Users who have added this user as a friend
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function friendOf() {
        return $this->belongsToMany(User::class, 'user_user', 'friend_id', 'user_id');
    }
}
