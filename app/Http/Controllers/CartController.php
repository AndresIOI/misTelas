<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Inventario_Productos_Terminados;

class CartController extends Controller
{
    //
	public function __construct()
	{
		if(!\Session::has('cart')) \Session::put('cart', array());
	}

    // Show cart
    public function show()
    {
    	$cart = \Session::get('cart');
    	$total = $this->total();
    	return view('shop.cart', compact('cart', 'total'));
    }

    // Add item
    public function add(Inventario_Productos_Terminados $product)
    {
    	$cart = \Session::get('cart');
    	$product->quantity = 1;
    	$cart[$product->id] = $product;
        \Session::put('cart', $cart);
    	return redirect()->route('cart-show');
    }

    // Delete item
    public function delete(Inventario_Productos_Terminados $product)
    {
    	$cart = \Session::get('cart');
    	unset($cart[$product->id]);
    	\Session::put('cart', $cart);

    	return redirect()->route('cart-show');
    }

    // Update item
    public function update(Inventario_Productos_Terminados $product, $quantity)
    {
    	$cart = \Session::get('cart');
    	$cart[$product->id]->quantity = $quantity;
    	\Session::put('cart', $cart);

    	return redirect()->route('cart-show');
    }

    // Trash cart
    public function trash()
    {
    	\Session::forget('cart');

    	return redirect()->route('cart-show');
    }

    // Total
    private function total()
    {
    	$cart = \Session::get('cart');
    	$total = 0;
    	foreach($cart as $item){
    		$total += $item->producto->precio_publico * $item->quantity;
    	}

    	return $total;
    }

    // Detalle del pedido
    public function orderDetail()
    {
        if(count(\Session::get('cart')) <= 0) return redirect()->route('shop');
        $cart = \Session::get('cart');
        $total = $this->total();

        return view('shop.order-detail', compact('cart', 'total'));
    }
}
