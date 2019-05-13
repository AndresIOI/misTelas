<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoReingresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_reingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reingreso_id');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('talla_id');
            $table->float('cantidad_reingreso');
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
        Schema::dropIfExists('producto_reingreso');
    }
}
