<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value');
            $table->string('type');
            $table->text('note');

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
        Schema::drop('payments');
    }
}
