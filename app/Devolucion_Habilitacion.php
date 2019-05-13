<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolucion_Habilitacion extends Model
{
    //
    public function habilitacions(){
        return $this->belongsToMany(Habilitacion::class,'habilitacions_devoluciones','devolucion_id','habilitacion_id')
            ->withPivot('cantidad');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function proveedor(){
        return $this->belongsTo(HabilitacionProveedor::class);
    }

    public function usuario_compras(){
        return $this->belongsTo(HabilitacionUsuariosOrden::class,'operarioCompra');
    }
    public function entrada(){
        return $this->belongsTo(Entrada_Habilitacion::class);   
    }
}
