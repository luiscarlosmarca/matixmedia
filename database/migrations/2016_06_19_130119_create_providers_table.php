<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('contact');//conctacto de la entidad
            $table->string('category');// select view category
            $table->timestamps();

            //****Campos de predeterminados ***///
            $table->text('note');
            $table->integer('user_id')->unsigned();//usuario que crea el registro
            $table->foreign('user_id')// el agente de venta
              ->references('id')->on('users')
              ->onUpdate('cascade');

            $table->integer('iduser_update')->unsigned();//usuario que actualiza el registro.
            $table->foreign('iduser_update')
              ->references('id')->on('users')
              ->onUpdate('cascade');
            ////**********************
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('providers');
    }
}
