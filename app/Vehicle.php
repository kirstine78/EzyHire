<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function setUpdatedAtAttribute() {
        $this->attributes['updated_at'] = Carbon::now();
    }
}
