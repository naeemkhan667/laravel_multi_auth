<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'user_role'=>'admin',
                'password'=> bcrypt('123456789'),
            ],
            [
               'name'=>'Seller',
               'email'=>'seller@gmail.com',
               'user_role'=>'seller',
               'password'=> bcrypt('123456789'),
            ],
            [
               'name'=>'Buyer',
               'email'=>'buyer@gmail.com',
               'user_role'=> 'buyer',
               'password'=> bcrypt('123456789'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
