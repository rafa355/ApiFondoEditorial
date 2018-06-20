<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->date('tiempo_planificado_total')->nullable();
            $table->date('tiempo_transcurrido_total')->nullable();
            $table->date('tiempo_real_total')->nullable();
            $table->unsignedInteger('proyecto_type_id');
            $table->foreign('proyecto_type_id')->references('id')->on('proyecto_type');
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
        Schema::dropIfExists('proyectos');
    }
}
