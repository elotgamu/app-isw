<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('codigo_pedido');
	          $table->datetime('fecha_pedido');
	          $table->string('direccion_pedido');
	          $table->string('receptor_pedido', 20);
	          $table->integer('negocio')->unsigned();
	          $table->foreign('negocio')->references('codigo_negocio')->on('negocio')->onDelete('cascade');
	          $table->integer('estado');
	          $table->boolean('pago_pedido');
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
        Schema::drop('pedido');
    }
}
