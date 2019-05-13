<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolucion_Productos extends Model
{
    //
    public function products(){
        return $this->belongsToMany(Producto_Terminado::class,'producto_devolucion','devolucion_id','producto_id')
            ->withPivot('talla_id','cantidad_devolucion');
    }
    public function entrada(){
        return $this->belongsTo(Entrada_Productos_Terminados::class,'entrada_id');
    }
}
