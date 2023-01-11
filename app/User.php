<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
    ];
    public function scopeWithAll($query)
    {
        return $query->with(['userCar','userLocation']);
    }
    public function userCar()
    {
        return $this->hasOneThrough(Car::class, UserCar::class);
    }
    public function userLocation()
    {
        return $this->hasOneThrough(State::class, UserLocation::class);
    }
}
