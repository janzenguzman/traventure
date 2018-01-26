<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    public $fillable = [
        'starttime',
        'endtime',
        'destination',
        'photo'
    ];

    protected $table = 'itinerary';

    protected $primaryKey = 'itinerary_id';
}
