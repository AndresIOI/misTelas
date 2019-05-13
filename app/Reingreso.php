<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reingreso extends Model
{
    //
    protected $fillable = ['id_reingreso','numeroRequisicion','usuario_id'];
    protected $primaryKey = 'id_reingreso';
    protected $table = 'reingresos';

    public function telas(){
        return $this->belongsToMany('App\Tela','reingresos_telas','id_reingreso','tela_id')
        ->withPivot('cantidadReingreso','color');
    }
    
    public function salida(){
        return $this->belongsTo(Salida::class,'numeroRequisicion');
    }
}
