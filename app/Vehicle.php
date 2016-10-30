<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function bookings() {

        // writing: Booking::class   is equivalent to: 'App\Comment'
        return $this->hasMany(Booking::class, 'fldCarId');
    }

    public function setUpdatedAtAttribute() {
        $this->attributes['updated_at'] = Carbon::now();
    }

    public function scopeNotRetired($query)
    {
        return $query->where('fldRetired', 0);
    }


}
