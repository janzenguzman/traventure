<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Slots extends Model
{
    public $fillable = [
        'package_id',
        'date_to',
        'date_from',
        'slots'
    ];
}
?>