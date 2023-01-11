<?php

use App\Repository\UserRepository;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    public $user;
    
    public function __construct()
    {
        $this->user =  new UserRepository();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Storage::disk('local')->get('users.json');
        $users = json_decode($users, true);

        foreach ($users as $user) {
            
            $saved_user = $this->user->create([
                "name" => $user['name'],
            ]);
        }
    }
}
