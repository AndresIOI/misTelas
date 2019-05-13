<?php

use Illuminate\Database\Seeder;
use App\Tela;
class TelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tela = new Tela();
        $tela->id = '1';
        $tela->cve_tela = 'Berna';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '2';
        $tela->save();

        $tela = new Tela();
        $tela->id = '2';
        $tela->cve_tela = 'Berna';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '3';
        $tela->save();

        $tela = new Tela();
        $tela->id = '3';
        $tela->cve_tela = 'Caracas';
        $tela->descripcion = '100% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '8';
        $tela->save();

        $tela = new Tela();
        $tela->id = '4';
        $tela->cve_tela = 'Carlo';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '2';
        $tela->save();

        $tela = new Tela();
        $tela->id = '5';
        $tela->cve_tela = 'Carlo';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '3';
        $tela->save();

        $tela = new Tela();
        $tela->id = '6';
        $tela->cve_tela = 'Daysi';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '2';
        $tela->save();

        $tela = new Tela();
        $tela->id = '7';
        $tela->cve_tela = 'Daysi';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '4';
        $tela->save();

        $tela = new Tela();
        $tela->id = '8';
        $tela->cve_tela = 'Estampado';
        $tela->descripcion = '50% Algodón-50% Poliester Estampado';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '3';
        $tela->save();

        $tela = new Tela();
        $tela->id = '9';
        $tela->cve_tela = 'Estampado';
        $tela->descripcion = '50% Algodón-50% Poliester Estampado';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '4';
        $tela->save();

        $tela = new Tela();
        $tela->id = '10';
        $tela->cve_tela = 'Niza';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '8';
        $tela->save();

        $tela = new Tela();
        $tela->id = '11';
        $tela->cve_tela = 'Oklahoma';
        $tela->descripcion = '100% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '12';
        $tela->save();

        $tela = new Tela();
        $tela->id = '12';
        $tela->cve_tela = 'Oklahoma Felpa';
        $tela->descripcion = '100% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '12';
        $tela->save();

        $tela = new Tela();
        $tela->id = '13';
        $tela->cve_tela = 'Platón';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '6';
        $tela->save();

        $tela = new Tela();
        $tela->id = '14';
        $tela->cve_tela = 'Romers';
        $tela->descripcion = '90% Algodón-10% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '8';
        $tela->save();

        $tela = new Tela();
        $tela->id = '15';
        $tela->cve_tela = 'Tubular';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '2';
        $tela->save();

        $tela = new Tela();
        $tela->id = '16';
        $tela->cve_tela = 'Tubular';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '3';
        $tela->save();

        $tela = new Tela();
        $tela->id = '17';
        $tela->cve_tela = 'Tubular Algodón';
        $tela->descripcion = '100% Algodón';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '2';
        $tela->save();

        $tela = new Tela();
        $tela->id = '18';
        $tela->cve_tela = 'Tubular Algodón';
        $tela->descripcion = '50% Algodón-50% Poliester';
        $tela->unidad = 'KG';
        $tela->tipo_tela = '3';
        $tela->save();

        $tela = new Tela();
        $tela->id = '19';
        $tela->cve_tela = 'Tull 15';
        $tela->descripcion = '100% Poliester sin Gliter';
        $tela->unidad = 'MTS';
        $tela->tipo_tela = '10';
        $tela->save();

        $tela = new Tela();
        $tela->id = '20';
        $tela->cve_tela = 'Tull Galaxia';
        $tela->descripcion = '100% Poliester con Glitter';
        $tela->unidad = 'MTS';
        $tela->tipo_tela = '10';
        $tela->save();
    }
}
