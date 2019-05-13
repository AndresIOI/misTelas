<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilitacionsReingresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilitacions_reingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reingreso_id');
            $table->unsignedInteger('habilitacion_id');
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
        Schema::dropIfExists('habilitacions_reingresos');
    }
}
