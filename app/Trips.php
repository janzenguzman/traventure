<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    public $primaryKey = 'trip_id';

    public function bookings(){
        return $this->hasManyThrough('App\Booking', 'App\Travelers');
    }
}
