<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToProyectoTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyecto_type', function (Blueprint $table) {
            $table->enum('status', ['activo','eliminado'])->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyecto_type', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
