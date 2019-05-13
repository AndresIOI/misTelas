<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelasCantidadesColoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telas_cantidades_colores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('color');
            $table->foreign('color')->references('id_color')->on('colores');
            $table->unsignedInteger('tela_id');
            $table->foreign('tela_id')->references('id')->on('telas');
            $table->float('cantidad');
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
        Schema::dropIfExists('telas_cantidades_colores');
    }
}
