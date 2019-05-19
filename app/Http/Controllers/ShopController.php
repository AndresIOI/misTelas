<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario_Productos_Terminados;

class ShopController extends Controller
{
    //
    public function shop(){

        $productos_inventario = Inventario_Productos_Terminados::all();
        return view('shop.shop', compact('productos_inventario'));
    }

    public function cantidad($id){
        return Inventario_Productos_Terminados::find($id)->cantidad_inventario;
    }
}