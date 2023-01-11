<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{   
    public $user;
    
    public function __construct()
    {
        $this->user =  new UserRepository();
    }

    public function index()
    {
        
        $users = $this->user->all();
        
        $users = UserResource::collection($users);
        
        return generateResponse($users,true,Lang::get('topdot.user.list'),null,'object');
    }
    
    public function show($id)
    {
        $user = $this->user->getById($id);
        
        $user = UserResource::make($user);

        return generateResponse($user,true,Lang::get('topdot.user.single'),null,'object');
    }
    
    public function create(CreateUserRequest $request)
    {   
        try{
            DB::beginTransaction();
                $user = $this->user->create($request->input());
                $response = generateResponse($user,true,Lang::get('topdot.user.created'),null,'object');
            DB::commit();
        }
          catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null,false,$e->getMessage(),null,'object');
        }
        return $response;
    }
    public function update(UpdateUserRequest $request, $id)
    {   
        try{
            DB::beginTransaction();
                $user = $this->user->update($id, $request->input());
                $response = generateResponse($user,true,Lang::get('topdot.user.created'),null,'object');
            DB::commit();
        }
          catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null,false,$e->getMessage(),null,'object');
        }
        return $response;
    }
    public function delete($id)
    {
        try{
            DB::beginTransaction();
                $this->user->deleteById($id);
                $response = generateResponse(null,true,Lang::get('topdot.user.deleted'),null,'object');
            DB::commit();
        }
          catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null,false,$e->getMessage(),null,'object');
        }
        return $response;
    }
}
