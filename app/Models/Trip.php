<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /**
     * Returns the festival this trip is related to.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function festival() {
        return $this->hasOne(Festival::class);
    }
}
