<?php

use Illuminate\Database\Seeder;
use App\TipoHabilitacion;

class TipoHab extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
    
        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Bolsa Polietileno';
        $tipo->clasificacion_id = 1;
        $tipo->save();
    
        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Etiqueta Bordada';
        $tipo->clasificacion_id = 2;
        $tipo->save();

        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Etiqueta Carton';
        $tipo->clasificacion_id = 2;
        $tipo->save();

        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Etiqueta Estampada Satinada';
        $tipo->clasificacion_id = 2;
        $tipo->save();

        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Etiqueta Transfer';
        $tipo->clasificacion_id = 2;
        $tipo->save();
        
        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Gancho Coordinado';
        $tipo->clasificacion_id = 3;
        $tipo->save();
        
        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Gancho Inferior';
        $tipo->clasificacion_id = 3;
        $tipo->save();
        
        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Gancho Superior';
        $tipo->clasificacion_id = 3;
        $tipo->save();
        
        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Plastico Clip';
        $tipo->clasificacion_id = 4;
        $tipo->save();

        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Plastico Barril';
        $tipo->clasificacion_id = 4;
        $tipo->save();
        
        $tipo = new TipoHabilitacion();
        $tipo->tipos_habilitaciones = 'Tela';
        $tipo->clasificacion_id = 4;
        $tipo->save();
    }
}
