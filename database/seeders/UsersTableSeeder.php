<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'james',
                'email' => 'dwightjames@gmail.com',
                'is_doctor' => '1',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'mercy',
                'email' => 'mercy@gmail.com',
                'is_doctor' => '0',
                'password' => bcrypt('password'),
            ],
        ];
        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
