<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjuntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ubicacion');
            $table->unsignedInteger('etapa_proyecto_id');
            $table->foreign('etapa_proyecto_id')->references('id')->on('etapas_proyecto');
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
        Schema::dropIfExists('adjuntos');
    }
}
