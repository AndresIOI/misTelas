<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Tela extends Model
{
    //
    protected $fillable = ['id_tipo_tela','tipo_tela'];
    protected $table = 'tipo_telas';
}
