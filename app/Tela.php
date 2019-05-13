<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tela extends Model
{
    //
    protected $fillable = ['descripcion', 'unidad', 'tipo_tela','cantidad'];

    public function entradas(){
        return $this->belongsToMany(Entrada::class, 'entrada_tela', 'tela_id', 'entrada_id')
        ->withPivot('nRollos','precioUnitario','importe','anchoRollo','color')->withTimestamps();
    }

    public function coloresCantidades(){
        return $this->hasMany(tela_color_cantidad::class);
    }

    public function tipo(){
        return $this->belongsTo(Tipo_Tela::class,'tipo_tela','id_tipo_tela');
    }

    public function salidas(){
        return $this->belongsToMany(Salida::class,'salida_tela','tela_id','numRequisicion')
        ->withPivot('cantidadSalida','color','precioUnitario','importeTotal');
    }

    public function reingresos(){
        return $this->belongsToMany(Reingreso::class,'reingresos_telas','tela_id','id_reingreso')
        ->withPivot('cantidadReingreso','color');
    }

    public function devoluciones(){
        return $this->belongsToMany(Devolucion::class,'devolucion_tela','tela_id','id_devolucion')
        ->withPivot('cantidadDevolucion','color');
    }
}
