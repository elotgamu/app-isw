<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesa', function (Blueprint $table) {
            $table->increments('codigo_mesa');
            $table->integer('reservacion')->unsigned()->nullable();
            $table->foreign('reservacion')->references('codigo_reservacion')->on('reservacion')->onDelete('cascade');
            $table->string('numero_mesa', 20);
            $table->integer('negocio')->unsigned()->nullable();
            $table->foreign('negocio')->references('codigo_negocio')->on('negocio')->onDelete('cascade');
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
        Schema::drop('mesa');
    }
}
