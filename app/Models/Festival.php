<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;

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
