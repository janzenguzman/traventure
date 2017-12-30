<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    public $fillable = [
        'date_from',
        'date_to',
        'client_fname',
        'client_lname',
        'contact_num',
        'client_email',
        'adult',
        'child',
        'infant',
        'note',
        'traveler_id',
        'status',
        'p_id',
        'expired'
    ];

    protected $primaryKey = 'package_id';
}
?>