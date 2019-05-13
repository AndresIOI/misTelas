<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empaque extends Model
{
    //
    protected $fillable = ['empaque'];

    public function habilitaciones(){
        return $this->hasMany(Habilitacion::class);
    }

}
