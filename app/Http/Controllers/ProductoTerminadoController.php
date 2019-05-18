<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Inventario_Productos_Terminados;
use App\Talla_Producto;
use App\Clasificacion_Producto;
use App\Producto_Terminado;
use App\Http\Requests\ProductoTerminadoCreateRequest;


class ProductoTerminadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function byTipos($clasificacion_id){
        return Clasificacion_Producto::find($clasificacion_id)->tipos;
    }

    public function indexProductos(){
        $productos = Producto_Terminado::all();
        return view('productos_terminados.index',compact('productos'));
    }

    public function index()
    {
        //
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6 ){
            $productos_inventario = Inventario_Productos_Terminados::all();
            foreach ($productos_inventario as $key => $producto) {
                $entradas_producto = DB::table('entradas_productos_terminados')
                                                    ->where('producto_terminado_id',$producto->producto_id) 
                                                    ->where('talla_id',$producto->talla_id)->get();
                $contador = 0;
                $precios_unitario = 0;
                foreach ($entradas_producto as $entrada) {
                    $precios_unitario = $precios_unitario + $entrada->costo_unitario;
                    $contador++;
                }
                $p = $precios_unitario/$contador;
                $promedio_precios[$key] = $precios_unitario/$contador;
                $consulta = Talla_Producto::find($producto->talla_id);
                $tallas[$key] = $consulta->talla;
                $precio_total_inventario += $p*$producto->cantidad_inventario;
            }
            return view('Inventario.indexPT',compact('productos_inventario','promedio_precios','precio_total_inventario','tallas'));
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
        //
        $clasificaciones = Clasificacion_Producto::all();
        return view('productos_terminados.create', compact('clasificaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoTerminadoCreateRequest $request)
    {
        //
        if($request->file('img')){
            $file = $request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
        }
        $producto_terminado = new Producto_Terminado();
        $producto_terminado->SKU = $request->SKU;
        $producto_terminado->clasificacion_id = $request->clasificacion_id;
        $producto_terminado->tipo_id = $request->tipo_id;
        $producto_terminado->descripcion = $request->descripcion;
        $producto_terminado->precio_publico = $request->precio_publico;
        $producto_terminado->img = $name;
        $producto_terminado->save();
         return redirect()->route('productos_terminados.index');
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
        $producto = Producto_Terminado::find($id);
        $clasificaciones = Clasificacion_Producto::all();

        return view('productos_terminados.edit',compact('producto','clasificaciones'));
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
        $request->validate([
            'SKU' => 'required|string|max:13|unique:producto__terminados,SKU,'.$id,
            'clasificacion_id' => 'required',
            'tipo_id' => 'required',
            'descripcion' => 'required',
            'precio_publico' => 'required|numeric',
            'img' => 'mimes:jpeg,jpg,png,gif'
        ]);
        $producto_terminado = Producto_Terminado::find($id);
        $producto_terminado->SKU = $request->SKU;
        $producto_terminado->clasificacion_id = $request->clasificacion_id;
        $producto_terminado->tipo_id = $request->tipo_id;
        $producto_terminado->descripcion = $request->descripcion;
        $producto_terminado->precio_publico = $request->precio_publico;
        if($request->file('img')){
            \File::delete(public_path('img/'.$producto_terminado->img));
            $file = $request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
            $producto_terminado->img = $name;
        }
        $producto_terminado->update();
        return redirect()->route('productos_terminados.index')->with('status', 'Se actualizo correctamente el PRODUCTO TERMINADO');
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
        $p_Terminado = Producto_Terminado::find($id);
        if ($p_Terminado->entradas->count() > 0 || $p_Terminado->salidas->count() > 0 || $p_Terminado->reingresos->count() > 0 || $p_Terminado->devoluciones->count() > 0) {
            return redirect()->route('productos_terminados.index')->with('fail','No se pudo borrar el Producto Terminado debido a que tiene algun registro de Entrada, Salida, Devolucion o Reingreso'); 
        } else {
            $p_Terminado->delete();
            return redirect()->route('productos_terminados.index')->with('status','Producto terminado borrado exitosamente');
        }
        

    }
}
