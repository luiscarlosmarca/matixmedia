<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cedula')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('address',50);
            $table->string('city');
            $table->string('reference',100)->nullable();
            $table->text('note')->nullable();
            $table->integer('idCreater')->nullable()->unsigned();//usuario que crean este item, se genera automatica desde el controlador.
            $table->integer('idEditer')->nullable()->unsigned();
            $table->timestamps();


            $table->foreign('idCreater')->references('id')->on('users');

            $table->foreign('idEditer')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
