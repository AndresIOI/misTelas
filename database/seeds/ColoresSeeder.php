<?php

use Illuminate\Database\Seeder;
use App\Colores;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = new Colores();
        $color->id_color = '1';
        $color->color = 'Amarillo Limón';
        $color->save();

        $color = new Colores();
        $color->id_color = '2';
        $color->color = 'Amarillo Mango';
        $color->save();

        $color = new Colores();
        $color->id_color = '3';
        $color->color = 'Aqua';
        $color->save();

        $color = new Colores();
        $color->id_color = '4';
        $color->color = 'Avena';
        $color->save();

        $color = new Colores();
        $color->id_color = '5';
        $color->color = 'Azul';
        $color->save();

        $color = new Colores();
        $color->id_color = '6';
        $color->color = 'Azul Marino';
        $color->save();

        $color = new Colores();
        $color->id_color = '7';
        $color->color = 'Azul Rey';
        $color->save();

        $color = new Colores();
        $color->id_color = '8';
        $color->color = 'Blanco';
        $color->save();

        $color = new Colores();
        $color->id_color = '9';
        $color->color = 'Bugambilia';
        $color->save();

        $color = new Colores();
        $color->id_color = '10';
        $color->color = 'Coral';
        $color->save();

        $color = new Colores();
        $color->id_color = '11';
        $color->color = 'Fiusha';
        $color->save();

        $color = new Colores();
        $color->id_color = '12';
        $color->color = 'Fresa';
        $color->save();

        $color = new Colores();
        $color->id_color = '13';
        $color->color = 'Gris';
        $color->save();

        $color = new Colores();
        $color->id_color = '14';
        $color->color = 'Gris Claro';
        $color->save();

        $color = new Colores();
        $color->id_color = '15';
        $color->color = 'Gris Jaspe';
        $color->save();

        $color = new Colores();
        $color->id_color = '16';
        $color->color = 'Gris Oxford';
        $color->save();

        $color = new Colores();
        $color->id_color = '17';
        $color->color = 'Jade';
        $color->save();

        $color = new Colores();
        $color->id_color = '18';
        $color->color = 'Lila';
        $color->save();

        $color = new Colores();
        $color->id_color = '19';
        $color->color = 'Morado';
        $color->save();

        $color = new Colores();
        $color->id_color = '20';
        $color->color = 'Negro';
        $color->save();

        $color = new Colores();
        $color->id_color = '21';
        $color->color = 'Palo de Rosa';
        $color->save();

        $color = new Colores();
        $color->id_color = '22';
        $color->color = 'Rojo';
        $color->save();

        $color = new Colores();
        $color->id_color = '23';
        $color->color = 'Rosa';
        $color->save();

        $color = new Colores();
        $color->id_color = '24';
        $color->color = 'Rosa Fuerte';
        $color->save();

        $color = new Colores();
        $color->id_color = '25';
        $color->color = 'Rosa Pastel';
        $color->save();

        $color = new Colores();
        $color->id_color = '26';
        $color->color = 'Turqueza';
        $color->save();

        $color = new Colores();
        $color->id_color = '27';
        $color->color = 'Verde';
        $color->save();

        $color = new Colores();
        $color->id_color = '28';
        $color->color = 'Verde Manzana';
        $color->save();

        $color = new Colores();
        $color->id_color = '29';
        $color->color = 'Verde Militar';
        $color->save();

        
    }
}
