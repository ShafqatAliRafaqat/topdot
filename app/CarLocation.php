<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarLocation extends Model
{
    protected $fillable = [
        'car_id', 'state_id'
    ];
    
}
