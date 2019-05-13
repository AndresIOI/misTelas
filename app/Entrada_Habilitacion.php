<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada_Habilitacion extends Model
{
    //
    protected $fillable = ['ordenCompra','claveFactura','fecha','OperarioRecepcion','operarioCompra','proveedor_id'];
    
    protected $table = 'habilitacion_entradas';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function habilitacions(){
        return $this->belongsToMany(Habilitacion::class,'entrada_habilitacion','entrada_id','habilitacion_id')
            ->withPivot('empaque_id','precio_unitario','precio_total','cantidad');
    }

    public function proveedor(){
        return $this->belongsTo(HabilitacionProveedor::class);
    }

    public function usuario_compras(){
        return $this->belongsTo(HabilitacionUsuariosOrden::class,'operarioCompra');
    }

    public function empaque(){
        return $this->belongsTo(Empaque::class);
    }
}
