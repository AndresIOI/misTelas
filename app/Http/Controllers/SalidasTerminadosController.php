<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Tventa;
use App\UserOrdenT;
use App\Inventario_Productos_Terminados;
use App\Producto_Terminado;
use App\Talla_Producto;
use App\SalidaProductoTerminado;
use App\Clasificacion_Producto;
use App\Http\Requests\StoreSalidaTerminadosRequest;

class SalidasTerminadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byContador($numRequisicion){
        $contador = SalidaProductoTerminado::where('numero_requisicion',$numRequisicion)->value('contador');
        return $contador;
    }

    public function byReiniciarContadorSalida($numRequisicion){
        $id = SalidaProductoTerminado::where('numero_requisicion',$numRequisicion)->value('id');
        $salida = SalidaProductoTerminado::find($id);
        $salida->contador = 0;
        $salida->contador_activo = true;
        $salida->save();
        $contador = SalidaProductoTerminado::where('numero_requisicion',$numRequisicion)->value('contador');
        return $contador;
    }

    public function detallesProducto($id){
        $producto_find = Producto_Terminado::find($id);
        $productos = Inventario_Productos_Terminados::where('producto_id',$id)->get();
        foreach ($productos as $key => $producto) {
            $tallas[] = ['id' => $producto->talla_id, 'talla' => Talla_Producto::where('id',$producto->talla_id)->value('talla')];
        }
        return $detalles = ['clasificacion' => $producto_find->clasificacion->clasificacion_producto, 'tipo' => $producto_find->tipo->tipo_producto, 'descripcion' => $producto_find->descripcion, 'tallas'=>$tallas];
    }

    public function detallesTallas($talla_id,$producto_id){
        $producto_inventario = Inventario_Productos_Terminados::where([
            ['producto_id',$producto_id],
            ['talla_id',$talla_id]
        ])->get();
        $cantidad = Inventario_Productos_Terminados::where([
            ['producto_id',$producto_id],
            ['talla_id',$talla_id]
        ])->value('cantidad_inventario');
        $entradas_producto = DB::table('entradas_productos_terminados')
                                                    ->where('producto_terminado_id',$producto_id) 
                                                    ->where('talla_id',$talla_id)->get();
                $contador = 0;
                $precios_unitario = 0;
                foreach ($entradas_producto as $entrada) {
                    $precios_unitario = $precios_unitario + $entrada->costo_unitario;
                    $contador++;
                }
                $p = $precios_unitario/$contador;
        return $detalles = ['cantidad' => $cantidad, 'precio_unitario' => $p];
    }

    public function index()
    {
        $salidas_productos = SalidaProductoTerminado::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6 ){
            return view('salidast.index',compact('salidas_productos'));
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
        $Tipo_venta = Tventa::all();
        $Nombre_userOrden = UserOrdenT::all();

        // $nombre_usuarioT = UsuarioT::all();

        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 ){
            $productos_inventarios = Inventario_Productos_Terminados::where('cantidad_inventario','>',0)->get();
            foreach ($productos_inventarios as $key => $producto) {
                $skus[] = $producto->producto_id;
            }
            $t = array_unique($skus);
            foreach ($t as $key => $producto_id) {
                $p[] = Inventario_Productos_Terminados::where('producto_id',$producto_id)->first();
            }
            return view('salidast.create',compact('Tipo_venta','Nombre_userOrden','p'));
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
    public function store(StoreSalidaTerminadosRequest $request)
    {
        //
        $contador = SalidaProductoTerminado::where('numero_requisicion',$request->numRequisicion)->value('contador');
        $contadorActivado = SalidaProductoTerminado::where('numero_requisicion',$request->numRequisicion)->value('contador_activo');

        if(($contador < 3 && $contador > 0) || ($contador < 3 && $contador >= 0 && $contadorActivado == true)){
            $idSalida = SalidaProductoTerminado::where('numero_requisicion',$request->numRequisicion)->value('id');
            $salida = SalidaProductoTerminado::find($idSalida);
            $salida->contador++;
            $salida->importe_total_salida += $request->importeSalida;
            $salida ->save();

        }elseif($contador >= 3){
            return redirect()->route('Salida-Terminados.index')->with('errorContador', 'No se puedo realizar la salida. 
            Error: Alcanzo el maximo de salidas posibles de un numero de requisicion'); 
        }elseif($contador == 0){
            $salida = new SalidaProductoTerminado();
            $salida->numero_requisicion = $request->numRequisicion;
            $salida->contador++;
            $salida->importe_total_salida = $request->importeSalida;
            $salida->tipoSalida_id = $request->tipoSalida;
            $salida->usuarioSalida_id = $request->usuario_ordenS;
            $salida->usuario_id = Auth::user()->id;
            $salida->save();
        }

        for ($i=0; $i < count($request->sku_modelo); $i++) { 
            $sku = implode('',$request->sku_modelo[$i]);
            $talla = implode('',$request->talla[$i]);
            $cantidad_salida = implode('',$request->CantidadUnidadesSalida[$i]);
            $precio_unitario = implode('',$request->PrecioU[$i]);
            $costo_total = implode('',$request->Costo[$i]);
            $clasificacion = implode('',$request->clasificacion[$i]);

            $producto_id = Producto_Terminado::where('SKU',$sku)->value('id');
            $clasificacion_id = Clasificacion_Producto::where('clasificacion_producto',$clasificacion)->value('id');
            $talla_id = Talla_Producto::where([
                ['talla',$talla],
                ['clasificacion_id',$clasificacion_id]
            ])->value('id');
            $producto_inventario = Inventario_Productos_Terminados::where([
                ['producto_id',$producto_id],
                ['talla_id',$talla_id]
            ])->first();
            $cantidad_inventario = Inventario_Productos_Terminados::where([
                ['producto_id',$producto_id],
                ['talla_id',$talla_id]
            ])->value('cantidad_inventario');
            $producto_inventario->cantidad_inventario = $cantidad_inventario - $cantidad_salida;
            $producto_inventario->save();

            $salida->products()->attach($producto_id,array('talla_id' => $talla_id, 'cantidad' => $cantidad_salida, 'precio_unitario' => $precio_unitario, 'precio_total' => $costo_total));
        }

        //return redirect()->route('Salida-Habilitacion.show', $salida->id);
        return redirect()->route('Salida-Terminados.show', [$salida->id])->with('status', 'Salida Creada Correctamente');
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
            $salida_productos = SalidaProductoTerminado::find($id);
            foreach ($salida_productos->products as $key => $producto) {
                $tallas[$key] = Talla_Producto::where('id',$producto->pivot->talla_id)->value('talla');
            }
            return view('salidast.show',compact('salida_productos','tallas'));
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
        $salida = SalidaProductoTerminado::find($id);
        foreach ($salida->products as $key => $producto) {
            $tallas[$key] = Talla_Producto::where('id',$producto->pivot->talla_id)->value('talla');
        }
        $tipos = Tventa::all();
        $usersO = UserOrdenT::all();
        return view('salidast.edit',compact('salida','tallas','tipos','usersO'));
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
        $salida = SalidaProductoTerminado::find($id);
        $salida->numero_requisicion = $request->num_req;
        $salida->tipoSalida_id = $request->tipo_id;
        $salida->usuarioSalida_id = $request->usuarioO_id;
        $salida->update();

        return redirect()->route('Salida-Terminados.show', [$salida->id])->with('status', 'Salida actualizada correctamente');

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
