<?php

namespace App\Http\Controllers;

use App\Http\Requests\State\CreateStateRequest;
use App\Http\Requests\State\UpdateStateRequest;
use App\Http\Resources\StateResource;
use App\Repository\StateRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class StateController extends Controller
{   
    public $state;
    
    public function __construct()
    {
        $this->state =  new StateRepository();
    }

    public function index()
    {
        $states = $this->state->all();

        $states = StateResource::collection($states);
        
        return generateResponse($states,true,Lang::get('topdot.state.list'),null,'object');
    }
    
    public function show($id)
    {
        $state = $this->state->getById($id);
        
        $state = StateResource::make($state);

        return generateResponse($state,true,Lang::get('topdot.state.single'),null,'object');
    }
    
    public function create(CreateStateRequest $request)
    {   
        try{
            DB::beginTransaction();
                $state = $this->state->create($request->input());
                $response = generateResponse($state,true,Lang::get('topdot.state.created'),null,'object');
            DB::commit();
        }
          catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null,false,$e->getMessage(),null,'object');
        }
        return $response;
    }
    public function update(UpdateStateRequest $request, $id)
    {   
        try{
            DB::beginTransaction();
                $state = $this->state->update($id, $request->input());
                $response = generateResponse($state,true,Lang::get('topdot.state.created'),null,'object');
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
                $this->state->deleteById($id);
                $response = generateResponse(null,true,Lang::get('topdot.state.deleted'),null,'object');
            DB::commit();
        }
          catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null,false,$e->getMessage(),null,'object');
        }
        return $response;
    }
}
