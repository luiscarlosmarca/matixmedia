<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->text('details');
            $table->double('price');
            $table->string('phase');//fase del proyecto en la vista select box
            $table->string('formPay');//select en la vista
            $table->string('contract');//adjuntar el pdf del contrato firmado
            $table->string('file')->nullable();//archivo rar de info inicial del proyecto
            $table->date('dateStart');
            $table->date('dateFinish');
      
            //relaciones
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')
              ->references('id')->on('services')
              ->onUpdate('cascade');

            $table->integer('developer_id')->unsigned();
            $table->foreign('developer_id')
              ->references('id')->on('users')
              ->onUpdate('cascade');

            $table->integer('costumer_id')->unsigned();
            $table->foreign('costumer_id')
                ->references('id')->on('users')
                ->onUpdate('cascade');


            ///*****
            $table->timestamps();
                //****Campos de predeterminados ***///
            $table->text('note');
            $table->integer('iduser_create');//usuario que crea el registro
            $table->integer('iduser_update');//usuario que actualiza el registro.
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
        Schema::drop('projects');
    }
}
