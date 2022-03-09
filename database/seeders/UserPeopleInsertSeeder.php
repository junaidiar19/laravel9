<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPeopleInsertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            // 1. insert to table users
            $userData = [
                'name' => 'Contoh Nama',
                'email' => 'example@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user'
            ];
    
            $user = User::create($userData);
    
            // 2. insert to table people
            $peopleData = [
                'phone' => '0822222222',
                'about' => 'this is about me',
                'address' => 'Banjarmasin',
                'user_id' => $user->id
            ];
    
            Person::create($peopleData);
        });
    }
}
