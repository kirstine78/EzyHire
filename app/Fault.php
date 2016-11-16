<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            Fault.php
 */

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
