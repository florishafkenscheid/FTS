<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    /**
     * Trips that belong to the bus.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trips() {
        return $this->belongsToMany(Trip::class);
    }
}
