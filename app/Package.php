<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorites;
use Illuminate\Support\Facades\Auth;
use Eloquent;

class Package extends Model
{
    //Table Name
    protected $table = 'packages';
    //Primary Key
    public $primaryKey = 'package_id';

    protected $guarded = [];

    public $fillable = [
        'package_name',
        'days',
        'adult_price',
        'child_price',
        'infant_price',
        'excess_price',
        'type',
        'pax1',
        'pax1_price',
        'pax2',
        'pax2_price',
        'pax3',
        'pax3_price',
        'inclusions',
        'add_info',
        'reminders',
        'categories',
    ];

    public function booking(){
        return $this->belongsTo('App\Booking');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorites', 'package_id');
    }

    public function traveler(){
        return $this->belongTo('App\Travelers');
    }

    public function favorites(){
        return $this->hasMany('App\Favorites', 'package_id');
    }
}
