<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('details');
            $table->double('price');

            $table->timestamps();

            //****Campos de predeterminados ***///
            $table->text('note');
            $table->integer('iduser_create');//usuario que crea el registro
            $table->foreign('iduser_create')// el agente de venta
              ->references('id')->on('users')
              ->onUpdate('cascade');

            $table->integer('iduser_update');//usuario que actualiza el registro.
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
        Schema::drop('services');
    }
}
