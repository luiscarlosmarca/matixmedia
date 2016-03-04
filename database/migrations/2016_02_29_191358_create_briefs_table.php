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
            $table->text('details');
            $table->string('type');//tipo de campaña
            $table->text('geography');// ubicacion de la campaña
            $table->string('budget');//presupuesto fijo o rango
            $table->string('website');
            $table->text('goles');
            $table->string('promotion');//valor agregado o promocion 
            $table->text('adverts');//anunccios de texto
            $table->text('keywords');
            $table->text('wordneg');//palabras negativas
            $table->text('suggestions');//sugerencia
            $table->string('file')->nullable();//imagenes de anuncios display o video

            $table->integer('project_id')->unsigned()->nullable();
            $table->integer('idCreater')->unsigned();
            $table->integer('idEditer')->unsigned();

            $table->timestamps();

             $table->foreign('project_id')
                  ->references('id')->on('projects');

            $table->foreign('idCreater')
                  ->references('id')->on('users');

            $table->foreign('idEditer')
                ->references('id')->on('users');
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
