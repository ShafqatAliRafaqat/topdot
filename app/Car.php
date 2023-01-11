<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'title', 'value' , 'parent_car_id'
    ];

    public function scopeWithAll($query)
    {
        return $query->with(['carUser','carLocation']);
    }

    public function parentCar()
    {
        return $this->belongsTo(Car::class);
    }
    public function CarModels()
    {
        return $this->hasMany(Car::class);
    }

    public function carUser()
    {
        return $this->hasOneThrough(User::class, UserCar::class);
    }
    public function carLocation()
    {
        return $this->hasOneThrough(State::class, CarLocation::class);
    }
}
