<?php

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
       App\User::create([
           "name"=>"Tomas Goldenberg",
           "email"=>"Tomasgoldenberg@hotmail.com",
           "password"=>bcrypt("123456")
        ]);


        factory(App\Post::class, 24)->create();
       
    }
}
