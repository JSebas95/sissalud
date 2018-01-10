<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class rootSeeder extends Seeder
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
