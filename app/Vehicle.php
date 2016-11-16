<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            Vehicle.php
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Vehicle extends Model
{
    /**
     * relationship currently not used in system
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings() {
        // writing: Booking::class   is equivalent to: 'App\Comment'
        return $this->hasMany(Booking::class, 'fldCarId');
    }

    
    public function setUpdatedAtAttribute() {
        $this->attributes['updated_at'] = Carbon::now();
    }


    /**
     * scope currently not used in system
     * @param $query
     * @return mixed
     */
    public function scopeNotRetired($query)
    {
        return $query->where('fldRetired', 0);
    }

}
