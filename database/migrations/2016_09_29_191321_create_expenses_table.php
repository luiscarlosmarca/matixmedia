<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->text('details');
            $table->double('value');

            //relaciones
            $table->integer('provider_id')->unsigned();//select proveedores
            $table->foreign('provider_id')
              ->references('id')->on('providers')
              ->onUpdate('cascade');

            $table->timestamps();

            //****Campos de predeterminados ***///
            $table->text('note');
            $table->integer('iduser_create')->unsigned();//usuario que crea el registro
            $table->foreign('iduser_create')// el agente de venta
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
        Schema::drop('expenses');
    }
}
