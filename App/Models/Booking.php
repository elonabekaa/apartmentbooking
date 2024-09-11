<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model ;

class Booking extends Model
{
    // protected $fillable = [
    //     'user_id',
    //     'apartment_id',
    //     'check_in',
    //     'check_out',
    //     'total_price',
    // ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

}
