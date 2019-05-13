<?php

use Illuminate\Database\Seeder;
use App\Tipo_Tela;

class TipoTelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '1';
        $tipo_tela->tipo_tela = 'Bombay';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '2';
        $tipo_tela->tipo_tela = 'Cardigan';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '3';
        $tipo_tela->tipo_tela = 'Chifon Openend';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '4';
        $tipo_tela->tipo_tela = 'Chifon Peinado';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '5';
        $tipo_tela->tipo_tela = 'Felpa';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '6';
        $tipo_tela->tipo_tela = 'Frech Terry';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '7';
        $tipo_tela->tipo_tela = 'Gabardina';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '8';
        $tipo_tela->tipo_tela = 'Licra';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '9';
        $tipo_tela->tipo_tela = 'Popelina';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '10';
        $tipo_tela->tipo_tela = 'Sintetica';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '11';
        $tipo_tela->tipo_tela = 'Toalla Algodón';
        $tipo_tela->save();

        $tipo_tela = new Tipo_Tela();
        $tipo_tela->id_tipo_tela = '12';
        $tipo_tela->tipo_tela = 'Toalla Poliester';
        $tipo_tela->save();
    }
}
