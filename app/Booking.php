<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function vehicle() {

        return $this->belongsTo(Vehicle::class, 'fldCarId');
    }

    public function damage() {

        return $this->hasOne(Damage::class, 'fldBookingNo');
    }

}
