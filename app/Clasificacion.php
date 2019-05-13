<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    //
    protected $fillable = ['Clasificacion'];

    public function tiposHabilitacion(){
        return $this->hasMany(TipoHabilitacion::class);
    }
}
