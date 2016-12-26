<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        "userID",
        "carID",
        "pickupLocation",
        "returnLocation",
        "pickupDate",
        "returnDate",
        "extras",
        "price",
    ];

    protected $casts = [
        'extras' => 'json',
    ];
}
