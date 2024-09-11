<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model ;

class Apartment extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
        'price_per_night',
        'max_guests',
    ];

}

