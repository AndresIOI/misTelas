<?php

use Illuminate\Database\Seeder;
use App\Tproduccion;

class TproduccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produccion = new Tproduccion();
        $produccion->Tipo_produccion = 'Interna';
        $produccion->save();

        $produccion = new Tproduccion();
        $produccion->Tipo_produccion = 'Externa';
        $produccion->save();
    }
}
