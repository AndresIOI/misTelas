<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion_Producto extends Model
{
    //
    public function tallas(){
        return $this->hasMany(Talla_Producto::class,'clasificacion_id');
    }

    public function tipos(){
        return $this->belongsToMany(Tipo_Producto::class,'clasificacion_tipo','clasificacion_id','tipo_id');
    }

}
