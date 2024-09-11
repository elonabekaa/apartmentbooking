<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model ;

class Amenitie extends Model
{
    protected $fillable = [
        'apartment_id',
        'amenity_name',
        'created_at	',
        'updated_at',

    ];
}

