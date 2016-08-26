<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->text('tender');//propuesta inicial que se le hace al cliente
            //** Requerimientos para el developer
            $table->text('fields');// campos y escruturas de base de datos entidades y Campos
            $table->text('functional');//requerimientos funcionales
            $table->text('nofunctional');//requerimientos no funcionales

            //** sitio website
            $table->string('website');

            $table->text('details');// todos los demas detalles.

            //*** Publicidad
            $table->text('goles');//objetivos
            $table->string('type');//tipo de campaña
            $table->text('geography');// ubicacion de la campaña
            $table->string('budget');//presupuesto fijo o rango
            $table->string('promotion');//valor agregado o promocion
            $table->text('adverts');//anuncios de texto
            $table->text('keywords');
        

            $table->string('file')->nullable();//imagenes de anuncios display o video

        //** Relaciones
            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')
                 ->references('id')->on('projects');


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
        Schema::drop('briefs');
    }
}
