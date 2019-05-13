<?php

use Illuminate\Database\Seeder;
use App\HabilitacionProveedor;

class ProveedorH extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new HabilitacionProveedor();
        $user->nombre_proveedorH = 'ALTIMA';
        $user->save();

        $user = new HabilitacionProveedor();
        $user->nombre_proveedorH = 'TEJIDO SANTIAGO';
        $user->save();

        $user = new HabilitacionProveedor();
        $user->nombre_proveedorH = 'BOTONES ARCOIRIRS';
        $user->save();
    }
}
