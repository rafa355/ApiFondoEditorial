<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->enum('etapa', ['ninguna','Preliminar','Diagramacion','Publicado'])->default('ninguna');
            $table->string('autor')->default('sin asignar');
            $table->string('correo')->default('sin asignar');
            $table->string('telefono')->default('sin asignar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('etapa','autor','correo','telefono');
        });
    }
}
