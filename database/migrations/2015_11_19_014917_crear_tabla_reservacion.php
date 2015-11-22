<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReservacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion', function (Blueprint $table) {
            $table->increments('codigo_reservacion');
            $table->datetime('fecha_reservacion');
            $table->string('cliente_reservacion', 100);
            $table->integer('cantidadpersonas_reservacion');
            $table->integer('estado_reservacion');
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
        Schema::drop('reservacion');
    }
}
