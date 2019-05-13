<?php

use Illuminate\Database\Seeder;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(TipoTelaSeeder::class);
         $this->call(TelaSeeder::class);
         $this->call(ColoresSeeder::class);
         $this->call(UsuarioComprasSeeder ::class);
         $this->call(ProveedorTSeeder::class);
         $this->call(RolSeeder::class);
         $this->call(Usersseeder::class);
         $this->call(UsuarioComprasH::class);
         $this->call(ProveedorH::class);
         $this->call(ClasiHabSeeder::class);
         $this->call(TipoHab::class);
         $this->call(HabilitacionSeeder::class);
         $this->call(EmpaqueSeeder::class);
         $this->call(UsuarioTSeeder::class);
         $this->call(MaquilerosSeeder::class);
         $this->call(TproduccionSeeder::class);
         $this->call(TventaSeeder::class);
         $this->call(UserOrdenTSeeder::class);
         $this->call(TipoProductoTSeeder::class);
         $this->call(ClasiProductoTSeeder::class);
         $this->call(TallaProductoTSeeder::class);
         $this->call(ClasificacionTipoTableSeeder::class);
         //$this->call(ProductosTerminadosTableSeeder::class);
         
    }
}
