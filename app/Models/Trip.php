<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    
    /**
     * Returns the festival this trip is related to.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function festival() {
        return $this->belongsTo(Festival::class);
    }
    
    public function bus() {
        return $this->belongsTo(Bus::class);
    }

    public function bookings() {
        return $this->belongsToMany(Booking::class);
    }
}
