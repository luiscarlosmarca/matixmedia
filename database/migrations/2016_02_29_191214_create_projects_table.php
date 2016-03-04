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
            $table->string('service');
            $table->text('feactures');
            $table->string('formPay');
            $table->text('note');
            $table->string('file')->nullable();//archivo rar de info inicial del proyecto
            $table->date('dateStart');
            $table->date('dateFinish');
            $table->integer('idCreater')->unsigned();
            $table->integer('idEditer')->unsigned();
            $table->integer('costumer_id')->unsigned();
            $table->timestamps();


            $table->foreign('costumer_id')
                ->references('id')->on('customers');

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
        Schema::drop('projects');
    }
}
