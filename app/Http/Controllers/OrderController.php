<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    //
    public function details($id){
        $orden = Order::find($id);
        return view('shop.order-show', compact('orden'));
    }
}
