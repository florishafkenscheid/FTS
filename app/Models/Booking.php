<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'amount_of_tickets'];

    /**
     * Trips that belong to the booking
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trips() {
        return $this->belongsToMany(Trip::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
