<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
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
        'photo',
        'agent_id'
    ];

    protected $primaryKey = 'package_id';
}
?>