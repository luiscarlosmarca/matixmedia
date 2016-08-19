<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_company');//Perfil del cliente
            $table->string('address_company');
            $table->string('phone_company');
            $table->string('email_company');
            $table->string('reference');//fuente por el cliente llego
            $table->string('city');
            $table->string('curriculum');//****perfil del agente de venta hoja de vida
            $table->string('position');//cargo que se encuentra el agente o developer
            $table->string('efficiency');//rendimiento en que se encuentra
            $table->string('social'):// algun enlace alguna red social.
            $table->string('salary');//acuerdo de pago con el developer o agent
            $table->date('feNa');
        
            //relaciones con la tabla usuario
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
            ->on('users')

            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
