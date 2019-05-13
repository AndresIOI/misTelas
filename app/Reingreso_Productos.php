<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reingreso_Productos extends Model
{
    //
    public function products(){
        return $this->belongsToMany(Producto_Terminado::class,'producto_reingreso','reingreso_id','producto_id')
            ->withPivot('cantidad_reingreso','talla_id');
    }
    public function salida(){
        return $this->belongsTo(SalidaProductoTerminado::class,'salida_id');
    }
}
