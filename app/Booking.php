<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            Booking.php
 */

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
