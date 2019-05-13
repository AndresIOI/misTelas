<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\SalidaProductoTerminado;
use App\Producto_Terminado;
use App\Talla_Producto;
use App\Reingreso_Productos;
use App\Inventario_Productos_Terminados;
use App\Clasificacion_Producto;
use App\Http\Requests\StoreReingresoPTRequest;

class ReingresosTerminadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bySalida($numeroRequisicion){
        $salida_id = SalidaProductoTerminado::where('numero_requisicion',$numeroRequisicion)->value('id');
        $salida_productos = SalidaProductoTerminado::find($salida_id);
        foreach ($salida_productos->products as $key => $producto) {
            $productos[$key] = $producto->id;
        }
        $productos = array_unique($productos);
        foreach ($productos as $i => $p) {
            $sku = Producto_Terminado::where('id',$p)->value('SKU');
            $data[$i] = ['id' => $p, 'sku' => $sku];
        }
        return $data;
    }   

    public function byProductos($numeroRequisicion, $producto_id){
        $salida_id = SalidaProductoTerminado::where('numero_requisicion',$numeroRequisicion)->value('id');
        $productoF = Producto_Terminado::find($producto_id);
        $salida = SalidaProductoTerminado::find($salida_id);
        foreach ($salida->products as $key => $producto) {
            if($producto->id == $producto_id){
                $tallas[] = Talla_Producto::find($producto->pivot->talla_id);
            }
        }
        return $data = ['clasificacion' => $productoF->clasificacion->clasificacion_producto, 'tipo' => $productoF->tipo->tipo_producto, 'descripcion' => $productoF->descripcion, 'tallas' => $tallas];
    }

    public function byCantidad($numeroRequisicion,$producto_id,$talla_id){
        $salida_id = SalidaProductoTerminado::where('numero_requisicion',$numeroRequisicion)->value('id');
        return $cantidad = DB::table('producto_salida')->where([
            ['salida_id',$salida_id],
            ['producto_id',$producto_id],
            ['talla_id',$talla_id]
        ])->value('cantidad');
    }
    
    public function index()
    {
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6 ){
            $reingresos = Reingreso_Productos::all();
            return view('reingresost.index',compact('reingresos'));
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
            return view('reingresost.create',compact());
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
    public function store(StoreReingresoPTRequest $request)
    {
        //
        $salida_id = SalidaProductoTerminado::where('numero_requisicion',$request->num_requisicion)->value('id');
        $reingreso = new Reingreso_Productos;
        $reingreso->salida_id = $salida_id;
        $reingreso->usuario_id = Auth::user()->id;
        $reingreso->save();

        for ($i=0; $i < count($request->sku); $i++) { 
            $sku = implode('',$request->sku[$i]);
            $talla = implode('',$request->talla[$i]);
            $clasificacion = implode('',$request->clasificacion[$i]);
            $cantidad_reingreso = implode('',$request->CantidadUnidadesSalida[$i]);
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
            $producto_inventario->cantidad_inventario = $cantidad_inventario + $cantidad_reingreso;
            $producto_inventario->save();


            $reingreso->products()->attach($producto_id,array('cantidad_reingreso' => $cantidad_reingreso, 'talla_id' => $talla_id));
        }
        return redirect()->route('Reingreso-Terminados.show', [$reingreso->id])->with('status', 'Reingreso Creado Correctamente');
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
            $reingreso_productos = Reingreso_Productos::find($id);
            foreach ($reingreso_productos->products as $key => $producto) {
                $tallas[$key] = Talla_Producto::where('id',$producto->pivot->talla_id)->value('talla');
            }
            return view('reingresost.show',compact('reingreso_productos','tallas'));
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
