<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colores extends Model
{
    
    protected $fillable = ['id_color','color'];

//     public function colores(){
//         return $this->belongsToMany(Entrada::class, 'entrada', 'color','color');
//                            }
}
