<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file',40)->nullable();
            $table->date('date');
            $table->text('details');
            $table->string('state');//abierto en producion o cerrado
            $table->string('phase');//fase del proyecto select


            //relaciones
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                  ->references('id')->on('projects')
                  ->onUpdate('cascade');


            $table->integer('pay_id')->unsigned();//para ingresar algun pago asociado opcoines
            $table->foreign('pay_id')
                    ->references('id')->on('payments')
                    ->onUpdate('cascade');

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
        Schema::drop('tracings');
    }
}
