<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    /**
     * relationship not being used.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle() {

        return $this->belongsTo(Vehicle::class, 'fldCarId');
    }
}
