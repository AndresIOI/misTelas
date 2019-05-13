<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto_Terminado extends Model
{
    //
    public function clasificacion(){
        return $this->belongsTo(Clasificacion_Producto::class);
    }
    
    public function tipo(){
        return $this->belongsTo(Tipo_Producto::class);
    }
    public function tallas(){
        return $this->belongsTo(Talla_Producto::class);
    }

    public function entradas(){
        return $this->belongsToMany(Entrada_Productos_Terminados::class,'entradas_productos_terminados','producto_terminado_id','entrada_id')
            ->withPivot('cantidad_unidades','costo_unitario','costo_total','talla_id');
    }

    public function salidas(){
        return $this->belongsToMany(SalidaProductoTerminado::class,'producto_salida','producto_id','salida_id')
            ->withPivot('talla_id','cantidad','precio_unitario','precio_total');
    }

    public function reingresos(){
        return $this->belongsToMany(Reingreso_Productos::class,'producto_reingreso','producto_id','reingreso_id')
            ->withPivot('cantidad_reingreso','talla_id');
    }

    public function devoluciones(){
        return $this->belongsToMany(Devolucion_Productos::class,'producto_devolucion','producto_id','devolucion_id')
            ->withPivot('talla_id','cantidad_devolucion');
    }
}
