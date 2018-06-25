<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes');
            $table->date('fecha_entrega');
            $table->date('fecha_notificacion');
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
        Schema::dropIfExists('proyecciones');
    }
}
