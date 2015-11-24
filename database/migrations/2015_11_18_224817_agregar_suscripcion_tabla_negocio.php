<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarSuscripcionTablaNegocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('negocio', function (Blueprint $table) {
		        $table->integer('suscripcion')->unsigned()->nullable();
		        $table->foreign('suscripcion')->references('codigo_suscripcion')->on('suscripcion')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('negocio', function (Blueprint $table) {
		        $table->dropColumn('suscripcion');
            //
        });
    }
}
