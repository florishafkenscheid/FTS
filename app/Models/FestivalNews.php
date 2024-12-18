<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FestivalNews extends Model
{
    public function festival() {
        return $this->belongsTo(Festival::class);
    }
}
