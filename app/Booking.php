<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorites;
use Illuminate\Support\Facades\Auth;
use Eloquent;

class Booking extends Model
{
    //Table Name
    protected $table = 'bookings';
    //Primary Key
    public $primaryKey = 'booking_id';

    public function traveler(){
        return $this->belongsTo('App\Travelers');
    }

    public function packages(){
        //return $this->hasMany('App\Package');
        return $this->hasMany('App\Package', 'package_id');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorites');
    }
    
    public function favorited(){
        $id = auth()->user()->id;
        return (bool) Favorites::where('traveler_id', $id)
            ->where('package_id', $this->booking_id)
            ->first();
    }
}
