<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilitacion extends Model
{
    //
    public function tipoHabilitacion(){
        return $this->belongsTo(TipoHabilitacion::class);
    }

    public function empaque(){
        return $this->belongsTo(Empaque::class);
    }

    public function entradas(){
        return $this->belongsToMany(Entrada_Habilitacion::class,'entrada_habilitacion','habilitacion_id','entrada_id')
                    ->withPivot('empaque_id','precio_unitario','precio_total','cantidad');
    }

    public function salidas(){
        return $this->belongsToMany(Salida_Habilitacion::class,'habilitacions_salida','habilitacion_id','salida_id')
            ->withPivot('precio_unitario','precio_total','cantidad');
    }

    public function reingresos(){
        return $this->belongsToMany(Reingreso_Habilitacion::class,'habilitacions_reingresos','habilitacion_id','reingreso_id')
            ->withPivot('cantidad');
    }

    public function devoluciones(){
        return $this->belongsToMany(Devolucion_Habilitacion::class,'habilitacions_devoluciones','habilitacion_id','devolucion_id')
            ->withPivot('cantidad');
    }
}
