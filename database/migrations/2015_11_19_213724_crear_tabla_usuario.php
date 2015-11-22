<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('codigo_usuario');
            $table->string('nombre_usuario', 200);
            $table->string('passwd', 250);
            $table->boolean('estado');
            $table->integer('negocio')->unsigned()->nullable();
            $table->foreign('negocio')->references('codigo_negocio')->on('negocio');
            $table->integer('rol')->unsigned()->nullable();
            $table->foreign('rol')->references('codigo_rol')->on('rol');
            $table->nullableTimestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario');
    }
}
