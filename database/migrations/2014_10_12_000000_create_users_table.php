<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('role',['customer','agent','developer','admin']);
            $table->string('photo');
            $table->string('address');
            $table->integer('cellphone');
            $table->integer('phone');
            $table->cedula('string')->unique();

            //****Campos de predeterminados ***///
            $table->text('note');
            $table->integer('iduser_create');//usuario que crea el registro 
            $table->integer('iduser_update');//usuario que actualiza el registro.
            ////**********************

            $table->rememberToken();
            $table->timestamps();

            //relaciones


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
