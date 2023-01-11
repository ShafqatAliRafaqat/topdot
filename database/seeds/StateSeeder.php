<?php

use App\Repository\StateRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StateSeeder extends Seeder
{
    public $state;
    
    public function __construct()
    {
        $this->state =  new StateRepository();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = Storage::disk('local')->get('states.json');
        $states = json_decode($states, true);

        foreach ($states as $state) {
            
            $saved_state = $this->state->create([
                "name" => $state['name'],
                "code" => $state['code'],
                "capital" => $state['capital'],
                "year" => $state['year']
            ]);
        }
    }
}
