<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida_Habilitacion extends Model
{
    //
    public function habilitacions(){
        return $this->belongsToMany(Habilitacion::class,'habilitacions_salida','salida_id','habilitacion_id')
            ->withPivot('precio_unitario','precio_total','cantidad');
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



}
