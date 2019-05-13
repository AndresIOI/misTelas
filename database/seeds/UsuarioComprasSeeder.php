<?php

use Illuminate\Database\Seeder;
use App\UsuarioCompras;

class UsuarioComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new UsuarioCompras();
        $user->id_usuario = '1';
        $user->nombre_usuarioC = 'Alejandro Calderón';
        $user->save();

        $user = new UsuarioCompras();
        $user->id_usuario = '2';
        $user->nombre_usuarioC = 'Elizabeth Maldonado';
        $user->save();

        $user = new UsuarioCompras();
        $user->id_usuario = '3';
        $user->nombre_usuarioC = 'Mónica Martínez';
        $user->save();
    }
}
