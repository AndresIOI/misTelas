<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalidaProductoTerminado extends Model
{
    //
    public function products(){
        return $this->belongsToMany(Producto_Terminado::class,'producto_salida','salida_id','producto_id')
            ->withPivot('talla_id','cantidad','precio_unitario','precio_total');
    }
    public function usuario_orden(){
        return $this->belongsTo(UserOrdenT::class,'usuarioSalida_id');
    }
    public function tipo_salida(){
        return $this->belongsTo(Tventa::class,'tipoSalida_id');
    }
}
