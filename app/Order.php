<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function productos(){
        return $this->belongsToMany('App\Inventario_Productos_Terminados','order_items','order_id','product_id')
        ->withPivot('cantidad','precio','iva');
    }
    
}
