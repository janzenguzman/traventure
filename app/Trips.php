<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    public function bookings(){
        return $this->hasManyThrough('App\Booking', 'App\Travelers');
    }
}
