<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'email',
        'phone_number',
        'start_at',
        'end_at',
    ];

    public static function upcoming() {
        $today = Carbon::today()->toDateString();
        return Festival::where('start_at', '>', $today)
                      ->orderBy('start_at', 'asc')
                      ->get()
                      ->unique('name');
    }

    public function scopePrevious($query) {
        return $query->where('start_at', '<', Carbon::today())
                    ->orderBy('start_at', 'desc');
    }
    
    // Relations
    /**
     * Users that belong to this festival
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }

    /**
     * News that belongs to this festival
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news() {
        return $this->hasMany(FestivalNews::class);
    }

    /**
     * Trips that belong to this festival
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trips() {
        return $this->hasMany(Trip::class);
    }
}
