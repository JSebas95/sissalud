<?php

use Illuminate\Database\Seeder;

class root extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' 		=> 	'root',
        'email'		=>	'root@root.com',
        'password'	=>	bcrypt('321654'),

      ]);
    }
}