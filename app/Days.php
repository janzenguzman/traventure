<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    public $fillable = [
        'itinerary_id',
        'days',
        'photo'
    ];
}
