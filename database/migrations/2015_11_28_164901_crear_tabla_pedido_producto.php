<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPedidoProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->integer('pedido')->unsigned()->index();
            $table->foreign('pedido')->references('codigo_pedido')->on('pedido')->onDelete('cascade');
            $table->integer('cantidad_producto');
            $table->integer('producto')->unsigned()->index();
            $table->foreign('producto')->references('codigo_producto')->on('producto')->onDelete('cascade');
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
        Schema::drop('pedido_producto');
    }
}
