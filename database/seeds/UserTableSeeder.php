<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //crear los usuarios por defecto en la app, el primero es el usuario admin.



        factory(App\User::class)->create([
            'name'  =>'luiscarlosmarca',
            'email' =>'app@matixmedia.com.co',

            'role'  =>'admin',
            'password'=>('secret')

            ]);



    }
}
