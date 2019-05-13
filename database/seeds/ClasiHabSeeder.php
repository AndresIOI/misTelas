<?php

use Illuminate\Database\Seeder;
use App\Clasificacion;

class ClasiHabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clasificacion = new Clasificacion();
        $clasificacion->clasificacion = 'Bolsas de polietileno';
        $clasificacion->save();
        
        $clasificacion = new Clasificacion();
        $clasificacion->clasificacion = 'Etiquetas';
        $clasificacion->save();

        $clasificacion = new Clasificacion();
        $clasificacion->clasificacion = 'Ganchos';
        $clasificacion->save();

        $clasificacion = new Clasificacion();
        $clasificacion->clasificacion = 'Indicadores de tallas';
        $clasificacion->save();

        
    }
}
