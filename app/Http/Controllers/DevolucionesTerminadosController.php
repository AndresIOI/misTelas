<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Entrada_Productos_Terminados;
use App\Producto_Terminado;
use App\Talla_Producto;
use App\Devolucion_Productos;
use App\Inventario_Productos_Terminados;
use App\Clasificacion_Producto;
use App\Http\Requests\DevolucionPTStore;

class DevolucionesTerminadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function byProductosEntrada($factura){
        $entrada_id = Entrada_Productos_Terminados::where('numero_entrada',$factura)->value('id');
        $productos_entrada  =Entrada_Productos_Terminados::find($entrada_id)->productos;
        foreach ($productos_entrada as $key => $producto) {
            $productos[$key] = $producto->id;
        }
        $productos = array_unique($productos);
        $i = 0;
        foreach ($productos as $p) {
            $sku = Producto_Terminado::where('id',$p)->value('SKU');
            $data[$i] = ['id' => $p, 'sku' => $sku];
            $i++;
        }
        return $data;
    }

    public function byProductoDetalles($factura, $producto_id){
        $entrada_id = Entrada_Productos_Terminados::where('numero_entrada',$factura)->value('id');
        $productos_entrada = Entrada_Productos_Terminados::find($entrada_id)->productos;
        $productoF = Producto_Terminado::find($producto_id);

        foreach ($productos_entrada as $key => $producto) {
            if($producto->id == $producto_id){
                $tallas[] = Talla_Producto::find($producto->pivot->talla_id);
            }
        }
        return $data = ['clasificacion' => $productoF->clasificacion->clasificacion_producto, 'tipo' => $productoF->tipo->tipo_producto, 'descripcion' => $productoF->descripcion, 'tallas' => $tallas];
    }

    public function byProductoCantidad($factura, $producto_id, $talla_id){
        $entrada_id = Entrada_Productos_Terminados::where('numero_entrada',$factura)->value('id');
        return $cantidad = Inventario_Productos_Terminados::where([
            ['producto_id',$producto_id],
            ['talla_id',$talla_id]
        ])->value('cantidad_inventario');    
    }
    public function index()
    {
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6 ){
            $devoluciones = Devolucion_Productos::all();
            return view('devolucionest.index',compact('devoluciones'));
        }else{
            return view('layouts.sinPermisos');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 ){
            $entradas = Entrada_Productos_Terminados::all();
            return view('devolucionest.create',compact('entradas'));
        }else{
            return view('layouts.sinPermisos');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevolucionPTStore $request)
    {
        //
        $devolucion = new Devolucion_Productos();
        $entrada_id = Entrada_Productos_Terminados::where('numero_entrada',$request->factura)->value('id');
        $devolucion->entrada_id = $entrada_id;
        $devolucion->usuario_id = Auth::user()->id;
        $devolucion->save();
        for ($i=0; $i < count($request->sku); $i++) { 
            $sku = implode('',$request->sku[$i]);
            $talla = implode('',$request->talla[$i]);
            $clasificacion = implode('',$request->clasificacion[$i]);
            $cantidad_devolucion = implode('',$request->CantidadUnidadesSalida[$i]);

            $clasificacion_id = Clasificacion_Producto::where('clasificacion_producto',$clasificacion)->value('id');
            $talla_id = Talla_Producto::where([
                ['talla',$talla],
                ['clasificacion_id',$clasificacion_id]
            ])->value('id');

            $producto_id = Producto_Terminado::where('SKU',$sku)->value('id');
            $producto_inventario = Inventario_Productos_Terminados::where([
                ['producto_id',$producto_id],
                ['talla_id',$talla_id]
            ])->first();
            $cantidad_inventario = Inventario_Productos_Terminados::where([
                ['producto_id',$producto_id],
                ['talla_id',$talla_id]
            ])->value('cantidad_inventario');
            $producto_inventario->cantidad_inventario = $cantidad_inventario - $cantidad_devolucion;
            $producto_inventario->save();

            $devolucion->products()->attach($producto_id,array('cantidad_devolucion' => $cantidad_devolucion, 'talla_id'=>$talla_id));
        }
        return redirect()->route('Devolucion-Terminados.show', [$devolucion->id])->with('status', 'Devolución Creada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //        
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 ){
            $devolucion_productos = Devolucion_Productos::find($id);
            foreach ($devolucion_productos->products as $key => $producto) {
                $tallas[$key] = Talla_Producto::where('id',$producto->pivot->talla_id)->value('talla');
            }
            return view('devolucionest.show',compact('devolucion_productos','tallas'));
        }else{
            return view('layouts.sinPermisos');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
