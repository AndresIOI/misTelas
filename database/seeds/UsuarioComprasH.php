<?php

use Illuminate\Database\Seeder;
use App\HabilitacionUsuariosOrden;
class UsuarioComprasH extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new HabilitacionUsuariosOrden();
        $user->nombre_usuarioCH = 'Alejandro Calderon';
        $user->save();

        $user = new HabilitacionUsuariosOrden();
        $user->nombre_usuarioCH = 'Elizabeth Compras';
        $user->save();
    }
}
