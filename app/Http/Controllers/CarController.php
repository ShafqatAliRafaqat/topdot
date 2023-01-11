<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\CreateCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Repository\CarRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class CarController extends Controller
{   
    public $car;
    
    public function __construct()
    {
        $this->car =  new CarRepository();
    }

    public function index()
    {
        $cars = $this->car->all();

        $cars = CarResource::collection($cars);
        
        return generateResponse($cars,true,Lang::get('topdot.car.list'),null,'object');
    }
    
    public function show($id)
    {
        $car = $this->car->getById($id);
        
        $car = CarResource::make($car);

        return generateResponse($car,true,Lang::get('topdot.car.single'),null,'object');
    }
    
    public function create(CreateCarRequest $request)
    {   
        try{
            DB::beginTransaction();
                $car = $this->car->create($request->input());
                $response = generateResponse($car,true,Lang::get('topdot.car.created'),null,'object');
            DB::commit();
        }
          catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null,false,$e->getMessage(),null,'object');
        }
        return $response;
    }
    public function update(UpdateCarRequest $request, $id)
    {   
        try{
            DB::beginTransaction();
                $car = $this->car->update($id, $request->input());
                $response = generateResponse($car,true,Lang::get('topdot.car.created'),null,'object');
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
                $this->car->deleteById($id);
                $response = generateResponse(null,true,Lang::get('topdot.car.deleted'),null,'object');
            DB::commit();
        }
          catch (\Exception $e) {
            DB::rollBack();
            $response = generateResponse(null,false,$e->getMessage(),null,'object');
        }
        return $response;
    }
}
