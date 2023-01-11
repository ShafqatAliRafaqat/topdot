<?php 

namespace App\Repository;

use App\User;

class UserRepository extends AbstractRepository
{   
    protected $model ;

    public function __construct()
    {
        parent::__construct(new User());
    }
}