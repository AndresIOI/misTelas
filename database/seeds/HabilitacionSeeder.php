<?php

use Illuminate\Database\Seeder;
use App\Habilitacion;

class HabilitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///////////////////////////BOLSA POLIETILENO///////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'BP50';
        $habilitacion->descripcion = 'Bolsa Polietileno 50x50';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 1;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'BP70';
        $habilitacion->descripcion = 'Bolsa Polietileno 50x70';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 1;
        $habilitacion->save();
        
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'BP80';
        $habilitacion->descripcion = 'Bolsa Polietileno 50x80';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 1;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'BP90';
        $habilitacion->descripcion = 'Bolsa Polietileno 50x90';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 1;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'BP100';
        $habilitacion->descripcion = 'Bolsa Polietileno 50x100';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 1;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'BP120';
        $habilitacion->descripcion = 'Bolsa Polietileno 50x120';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 1;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'BP140';
        $habilitacion->descripcion = 'Bolsa Polietileno 50x140';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 1;
        $habilitacion->save();

        /////////////////////////ETIQUETA BORDADA////////////////////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EB01';
        $habilitacion->descripcion = 'Etiqueta Bordada 01';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 2;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EB02';
        $habilitacion->descripcion = 'Etiqueta Bordada 02';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 2;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EB03';
        $habilitacion->descripcion = 'Etiqueta Bordada 03';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 2;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EB04';
        $habilitacion->descripcion = 'Etiqueta Bordada 04';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 2;
        $habilitacion->save();
        /////////////////////////ETIQUETA CARTON////////////////////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EC01';
        $habilitacion->descripcion = 'Etiqueta Carton 01';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 3;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EC02';
        $habilitacion->descripcion = 'Etiqueta Carton 02';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 3;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EC03';
        $habilitacion->descripcion = 'Etiqueta Carton 03';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 3;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EC04';
        $habilitacion->descripcion = 'Etiqueta Carton 04';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 3;
        $habilitacion->save();
        /////////////////////////ETIQUETA ESTAMPADA SATINADA////////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EES01';
        $habilitacion->descripcion = 'Etiqueta Estampada Satinada 01';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 4;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EES02';
        $habilitacion->descripcion = 'Etiqueta Estampada Satinada 02';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 4;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EES03';
        $habilitacion->descripcion = 'Etiqueta Estampada Satinada 03';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 4;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'EES04';
        $habilitacion->descripcion = 'Etiqueta Estampada Satinada 04';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 4;
        $habilitacion->save();
        /////////////////////////ETIQUETA TRANSFER////////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ET01';
        $habilitacion->descripcion = 'Etiqueta Transfer 01';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 5;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ET02';
        $habilitacion->descripcion = 'Etiqueta Transfer 02';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 5;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ET03';
        $habilitacion->descripcion = 'Etiqueta Transfer 03';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 5;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ET04';
        $habilitacion->descripcion = 'Etiqueta Transfer 04';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 5;
        $habilitacion->save();

        ///////////////////////GANCHO COORDNIDADO//////////////////////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO102';
        $habilitacion->descripcion = 'Gancho Coordinado 102';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO104';
        $habilitacion->descripcion = 'Gancho Coordinado 104';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO106';
        $habilitacion->descripcion = 'Gancho Coordinado 106';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO108';
        $habilitacion->descripcion = 'Gancho Coordinado 108';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO212';
        $habilitacion->descripcion = 'Gancho Coordinado 212';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO214';
        $habilitacion->descripcion = 'Gancho Coordinado 214';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO508';
        $habilitacion->descripcion = 'Gancho Coordinado 508';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO510';
        $habilitacion->descripcion = 'Gancho Coordinado 510';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GCO512';
        $habilitacion->descripcion = 'Gancho Coordinado 512';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 6;
        $habilitacion->save();
        
        /////////////////////////GANCHO INFERIOR////////////////////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI102';
        $habilitacion->descripcion = 'Gancho Inferior 102';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI104';
        $habilitacion->descripcion = 'Gancho Inferior 104';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI106';
        $habilitacion->descripcion = 'Gancho Inferior 106';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI108';
        $habilitacion->descripcion = 'Gancho Inferior 108';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI212';
        $habilitacion->descripcion = 'Gancho Inferior 212';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI214';
        $habilitacion->descripcion = 'Gancho Inferior 214';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI508';
        $habilitacion->descripcion = 'Gancho Inferior 508';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI510';
        $habilitacion->descripcion = 'Gancho Inferior 510';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GI512';
        $habilitacion->descripcion = 'Gancho Inferior 512';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 7;
        $habilitacion->save();
        /////////////////////////GANCHO SUPERIOR////////////////////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS102';
        $habilitacion->descripcion = 'Gancho Superior 102';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS104';
        $habilitacion->descripcion = 'Gancho Superior 104';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS106';
        $habilitacion->descripcion = 'Gancho Superior 106';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS108';
        $habilitacion->descripcion = 'Gancho Superior 108';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS212';
        $habilitacion->descripcion = 'Gancho Superior 212';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS214';
        $habilitacion->descripcion = 'Gancho Superior 214';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS508';
        $habilitacion->descripcion = 'Gancho Superior 508';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS510';
        $habilitacion->descripcion = 'Gancho Superior 510';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'GS512';
        $habilitacion->descripcion = 'Gancho Superior 512';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 8;
        $habilitacion->save();
         /////////////////////////INDICADORES DE TALLAS PLASTICO CLIP///////////////////////////
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC4';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 4';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC6';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 6';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
         
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC8';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 8';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
         
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC10';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 10';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
         
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC2';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 2';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC3';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 3';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC3X';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 3X';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC12';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 12';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC14';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 14';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC16';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 16';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC16X';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 16X';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPC18';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla 18';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPCCH';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla CHICA ';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPCM';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla MEDIANA';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPCG';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla GRANDE';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPCXG';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Clip Talla EXTRA GRANDE';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 9;
         $habilitacion->save();
         /////////////////////////INDICADORES DE TALLAS PLASTICO BARRIL//////////////////////
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB4';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 4';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB6';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 6';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
         
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB8';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 8';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
         
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB10';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 10';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
         
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB2';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 2';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB3';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 3';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB3X';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 3X';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB12';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 12';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB14';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 14';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB16';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 16';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB16X';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 16X';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPB18';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla 18';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPBCH';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla CHICA ';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPBM';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla MEDIANA';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPBG';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla GRANDE';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
 
         $habilitacion = new Habilitacion();
         $habilitacion->clave = 'ITPBXG';
         $habilitacion->descripcion = 'Indicador de Talla Plastico Barril Talla EXTRA GRANDE';
         $habilitacion->unidad = 'PZ';
         $habilitacion->tipo_habilitacion_id = 10;
         $habilitacion->save();
        /////////////////////////INDICADORES DE TALLAS TELA////////////////////////////
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT4';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 4';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT6';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 6';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();
        
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT8';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 8';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();
        
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT10';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 10';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();
        
        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT2';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 2';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT3';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 3';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT3X';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 3X';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT12';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 12';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT14';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 14';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT16';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 16';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT16X';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 16X';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITT18';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla 18';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITTCH';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla CHICA ';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITTM';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla MEDIANA';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITTG';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla GRANDE';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();

        $habilitacion = new Habilitacion();
        $habilitacion->clave = 'ITTXG';
        $habilitacion->descripcion = 'Indicador de Talla Tela Talla EXTRA GRANDE';
        $habilitacion->unidad = 'PZ';
        $habilitacion->tipo_habilitacion_id = 11;
        $habilitacion->save();
    }
}
