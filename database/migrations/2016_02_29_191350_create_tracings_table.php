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
            $table->text('details');
            $table->string('state');//abierto en producion o cerrado
            $table->string('phase');//fase del proyecto
            $table->double('pay')->nullable();//para ingresar algun pago asociado
            $table->text('notes')->nullable();

            $table->integer('project_id')->unsigned();
            $table->integer('idCreater')->unsigned();

            $table->timestamps();

             $table->foreign('project_id')
                  ->references('id')->on('projects');

            $table->foreign('idCreater')
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
        Schema::drop('tracings');
    }
}
