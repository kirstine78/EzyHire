<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    public function vehicle() {

        return $this->belongsTo(Vehicle::class, 'fldCarId');
    }
}
