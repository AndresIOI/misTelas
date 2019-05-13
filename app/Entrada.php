<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    //
    protected $fillable = ['id', 'num_entrada', 'cve_factura', 'fecha','operarioRecepcion','id_usuarioC','id_usuario','id_proveedor'
    ];
    //NUMERO DE ENTRADA SE DEBE LLAMAR NUMERO DE PEDIDO

    public function telas(){
        return $this->belongsToMany('App\Tela','entrada_tela','entrada_id','tela_id')
        ->withPivot('nRollos','precioUnitario','importe','anchoRollo','color','cantidad');
    }
    
    public function usuario_compras(){  
            return $this->belongsToMany(UsuarioCompras::class, 'usuario_compras','id_usuarioC','id_usuario');
    }
    public function entradas_users(){  
        return $this->hasMany(User::class, 'users','id_usuario','id');

    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function usuario_c(){
        return $this->belongsTo(UsuarioCompras::class,'id_usuarioC');
    }


}

