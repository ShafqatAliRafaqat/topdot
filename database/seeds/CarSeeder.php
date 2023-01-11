<?php

use App\Repository\CarRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CarSeeder extends Seeder
{
    public $car;
    
    public function __construct()
    {
        $this->car =  new CarRepository();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      

        $cars = Storage::disk('local')->get('cars.json');
        $cars = json_decode($cars, true);

        foreach ($cars as $car) {
            
            $saved_car = $this->car->create([
                "title" => $car['title'],
                "value" => $car['value'],
            ]);
          
            if(isset($car['models']) && gettype($car['models']) == 'array'){
                
                foreach ($car['models'] as $model) {

                    $saved_car = $this->car->create([
                        "title" => $car['title'],
                        "value" => $car['value'],
                        "parent_car_id" => $saved_car['id'],
                    ]);
                }
            }
        }
    }
}
