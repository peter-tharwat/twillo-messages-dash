<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    	\App\Models\User::create([
    		'name'=>"Admin",   
    		'power'=>"ADMIN",
    		'email'=>"abdeenshoes@gmail.com",
    		'email_verified_at'=>date("Y-m-d h:i:s"), 
    		'password'=>bcrypt('wad123@wad700800900')
    	]); 
    }
}
