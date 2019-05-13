<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelaFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_tela', function (Blueprint $table) {
            $table->unsignedInteger('tela_id');
            $table->foreign('tela_id')->references('id')->on('telas');
            $table->unsignedInteger('entrada_id');
            $table->foreign('entrada_id')->references('id')->on('entradas');
            $table->integer('nRollos');
            $table->float('precioUnitario');
            $table->float('importe');
            $table->float('anchoRollo');
            $table->float('cantidad');
            $table->string('color',191);
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
        Schema::dropIfExists('entrada_tela');
    }
}
