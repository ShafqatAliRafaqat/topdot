<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCar extends Model
{
    protected $fillable = [
        'car_id', 'user_id'
    ];

    
}
