<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tela_color_cantidad extends Model
{
    //
    protected $fillable = ['id', 'color', 'tela_id','cantidad'];
    protected $table = 'telas_cantidades_colores';

    public function Telas(){
        return $this->belongsTo(Tela::class);
    }
}
