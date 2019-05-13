<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cve_tela',191);
            $table->string('descripcion',191);
            $table->string('unidad',191);
            $table->unsignedInteger('tipo_tela');
            $table->foreign('tipo_tela')->references('id_tipo_tela')->on('tipo_telas');
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
        Schema::dropIfExists('telas');
    }
}
