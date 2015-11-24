<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('codigo_usuario');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('estado');
            $table->rememberToken();
            $table->timestamps();
            //$table->integer('negocio')->unsigned()->nullable();
            //$table->foreign('negocio')->references('codigo_negocio')->on('negocio');
            //$table->integer('rol')->unsigned()->nullable();
            //$table->foreign('rol')->references('codigo_rol')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
