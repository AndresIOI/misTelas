<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioCompras extends Model
{
    //
    protected $fillable = ['id_usuario', 'nombre_usuarioC',];
    protected $primaryKey = "id_usuario";

    public function usuario_compras(){  
        return $this->HasMany(Entradas::class, 'usuario_compras','id_usuario','id_usuarioC');

                                 }
}
