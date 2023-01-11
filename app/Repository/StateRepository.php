<?php 

namespace App\Repository;

use App\Car;
use App\State;

class StateRepository extends AbstractRepository
{   
    protected $model ;

    public function __construct()
    {
        parent::__construct(new State());
    }
   
}