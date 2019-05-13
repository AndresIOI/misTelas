<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada_Productos_Terminados extends Model
{
    //
    public function productos(){
        return $this->belongsToMany(Producto_Terminado::class,'entradas_productos_terminados','entrada_id','producto_terminado_id')
            ->withPivot('cantidad_unidades','costo_unitario','costo_total','talla_id');
    }
    public function usuarioT(){
        return $this->belongsTo(UsuarioT::class,'empleado_id');
    }
    public function tipo_produccion(){
        return $this->belongsTo(Tproduccion::class,'tipo_produccion_id');
    }
    public function maquilero(){
        return $this->belongsTo(Maquileros::class,'maquilero_id');
    }
}
