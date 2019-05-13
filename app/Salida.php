<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    //
    protected $fillable = ['id','numeroRequisicion', 'usuario_id','contador','importeTotalSalida','contadorActivado'];
    protected $table = 'salidas';

    public function telas(){
        return $this->belongsToMany('App\Tela','salida_tela','numRequisicion','tela_id')
        ->withPivot('cantidadSalida','color','precioUnitario','importeTotal');
    }
}
