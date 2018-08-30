<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyResponsableProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responsable_proyecto', function (Blueprint $table) {
            $table->enum('tipo', ['principal','apoyo']);
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsable_proyecto', function (Blueprint $table) {
            $table->dropColumn(['tipo']);            
        });
    }
}
