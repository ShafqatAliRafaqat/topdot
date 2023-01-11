<?php 

namespace App\Repository;

use App\Car;

class CarRepository extends AbstractRepository
{   
    protected $model ;

    public function __construct()
    {
        parent::__construct(new Car());
    }
   
}