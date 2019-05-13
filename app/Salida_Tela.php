<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida_Tela extends Model
{
    //
    protected $fillable = ['id','tela_id','numRequisicion','color','cantidadSalida'];
    protected $table = "salida_tela";
}
