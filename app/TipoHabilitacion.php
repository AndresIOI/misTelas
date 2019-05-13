<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHabilitacion extends Model
{
    protected $table = 'tipo_habilitacions';
    protected $fillable = ['id','tipos_habilitaciones'];

    public function clasificacion(){
        return $this->belongsTo(Clasificacion::class);
    }

    public function habilitaciones(){
        return $this->hasMany(Habilitacion::class);
    }
}