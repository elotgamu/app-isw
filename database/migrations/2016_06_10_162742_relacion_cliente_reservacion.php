<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionClienteReservacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservacion', function (Blueprint $table) {
            $table->integer('clientes_id')->unsigned()->nullable();
            $table->foreign('clientes_id')
                  ->references('id')
                  ->on('clientes')->onDelete('cascade');
            $table->integer('negocio')->unsigned()->nullable();
            $table->foreign('negocio')
                  ->references('codigo_negocio')
                  ->on('negocio')->onDelete('cascade');
            $table->dropColumn('cliente_reservacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservacion', function (Blueprint $table) {
            $table->string('cliente_reservacion', 100);
            $table->dropForeign('reservacion_negocio_foreign');
            $table->dropColumn('negocio');
            $table->dropForeign('reservacion_clientes_id_foreign');
            $table->dropColumn('clientes_id');
        });
    }
}
