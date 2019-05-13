<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable = ['id','id_rol','rol'];


    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function rols_user(){  
        return $this->hasMany(Rol::class, 'user_rols','id','id_user');
                                }
}
