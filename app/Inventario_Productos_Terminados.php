<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario_Productos_Terminados extends Model
{
    //
    public function producto(){
        return $this->belongsTo(Producto_Terminado::class);
    }
    public function talla(){
        return $this->belongsTo(Talla_Producto::class);
    }
}
