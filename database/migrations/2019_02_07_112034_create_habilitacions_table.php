<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilitacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilitacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave',191)->unique();
            $table->string('descripcion',191);
            $table->string('unidad',191);
            $table->unsignedInteger('tipo_habilitacion_id');
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
        Schema::dropIfExists('habilitacions');
    }
}
