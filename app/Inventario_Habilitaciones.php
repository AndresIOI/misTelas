<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario_Habilitaciones extends Model
{
    //
    protected $table = 'inventario_habilitaciones';

    public function habilitacion(){
        return $this->belongsTo(Habilitacion::class);
    }
}
