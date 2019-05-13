<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    //
    protected $fillable = ['id_devolucion','id_usuario','ordenCompra'];
    protected $primaryKey = 'id_devolucion';
    
    protected $table = 'devolucions';

    public function telas(){
        return $this->belongsToMany('App\Tela','devolucion_tela','id_devolucion','tela_id')
        ->withPivot('cantidadDevolucion','color');
    }
}
