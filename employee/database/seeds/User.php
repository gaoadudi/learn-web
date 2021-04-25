<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Thêm admin
       	DB::table('users')->insert(['username'=>'admin', 'email'=>'admin@gmail.com', 'role'=>'1', 'password'=>bcrypt('123456')]);
    }
}
