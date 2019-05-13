<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReingresosTelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reingresos_telas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tela_id');
            $table->foreign('tela_id')->references('id')->on('telas');
            $table->unsignedInteger('id_reingreso');
            $table->foreign('id_reingreso')->references('id_reingreso')->on('reingresos');
            $table->string('color');
            $table->float('cantidadReingreso');
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
        Schema::dropIfExists('reingresos_telas');
    }
}
