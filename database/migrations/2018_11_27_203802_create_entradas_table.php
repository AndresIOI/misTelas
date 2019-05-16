<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_entrada')->unique();
            $table->string('cve_factura',191)->unique();;
            $table->string('fecha',191);
            $table->string('OperarioRecepcion',191);
            $table->unsignedInteger('id_usuarioC');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id')->on('proveedors');
            $table->foreign('id_usuarioC')->references('id_usuario')->on('usuario_compras');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->timestamps();
            //
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
