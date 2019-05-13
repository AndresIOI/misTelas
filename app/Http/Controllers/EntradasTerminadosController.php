<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\UsuarioT;
use App\Maquileros;
use App\Tproduccion;
use App\Tipo_Producto;
use App\Clasificacion_Producto;
use App\Producto_Terminado;
use App\Entrada_Productos_Terminados;
use App\Talla_Producto;
use App\Inventario_Productos_Terminados;
use App\Http\Requests\EntradaPTRequest;

class EntradasTerminadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detallesProducto($id){
        $producto_terminado_id = Producto_Terminado::where('SKU',$id)->value('id');
        $producto_terminado = Producto_Terminado::find($producto_terminado_id);
        $clasificacion = $producto_terminado->clasificacion;
        $tipo = $producto_terminado->tipo;
        $tallas = $clasificacion->tallas;
        return $datos = ['descripcion'=>$producto_terminado->descripcion,
                         'clasificacion'=>$clasificacion->clasificacion_producto,
                         'tipo'=>$tipo->tipo_producto,
                         'tallas'=>$tallas];
    }

    
    public function index()
    {
        $entrada = Entrada_Productos_Terminados::all();

        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6 ){
            return view('entradast.index',compact('entrada'));
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
        $fecha = Carbon::now()->format('d/m/Y');
        $nombre_usuarioT = UsuarioT::all();
        $nombre_maquilero =Maquileros::all();
        $Tipo_produccion = Tproduccion::all();
        $tipos_productos = Tipo_Producto::all();
        $clasificaciones_productos = Clasificacion_Producto::all();
    if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 5 ){
          return view('entradast.create',compact('fecha','nombre_usuarioT','nombre_maquilero','Tipo_produccion','tipos_productos','clasificaciones_productos'));
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
    public function store(EntradaPTRequest $request)
    {
        //
        $entrada = new Entrada_Productos_Terminados();
        $entrada->numero_entrada = $request->num_entrada;
        $entrada->empleado_id = $request->usuarioT;
        $entrada->numero_piezas = $request->piezas;
        $entrada->tipo_produccion_id = $request->produccion;
        $entrada->maquilero_id = $request->maquilero;
        $entrada->fecha = $request->fecha;
        $entrada->usuario_id = Auth::user()->id;
        $entrada->save();

        for ($i=0; $i < count($request->skue); $i++) { 
            $sku = implode('',$request->skue[$i]);
            $cantidad_unidades = implode('',$request->CantidadUnidades[$i]);
            $costo_unitario = implode('',$request->PrecioU[$i]);
            $costo_total = implode('',$request->Costo[$i]);
            $talla = implode('',$request->talla[$i]);
            $clasificacion = implode('',$request->clasificacion[$i]);
            $clasificacion_id = Clasificacion_Producto::where('clasificacion_producto',$clasificacion)->value('id');


            $producto_terminado_id = Producto_Terminado::where('SKU',$sku)->value('id');
            $talla_id = Talla_Producto::where([
                ['talla',$talla],
                ['clasificacion_id',$clasificacion_id]
            ])->value('id');

            $consulta_inventario = Inventario_Productos_Terminados::where([
                ['producto_id',$producto_terminado_id],
                ['talla_id',$talla_id]
            ])->value('id');

            if($consulta_inventario == null){
                $entrada_inventario = new Inventario_Productos_Terminados();
                $entrada_inventario->producto_id = $producto_terminado_id;
                $entrada_inventario->cantidad_inventario = $cantidad_unidades;
                $entrada_inventario->talla_id = $talla_id;
                $entrada_inventario->save();
            }else{
                $producto_inventario = Inventario_Productos_Terminados::find($consulta_inventario);
                $cantidad_inventario = Inventario_Productos_Terminados::where([
                    ['producto_id',$producto_terminado_id],
                    ['talla_id',$talla_id]
                ])->value('cantidad_inventario');
                $producto_inventario->cantidad_inventario = $cantidad_inventario + $cantidad_unidades;
                $producto_inventario->save();
            }

            $entrada->productos()->attach($producto_terminado_id,array('cantidad_unidades' => $cantidad_unidades, 'costo_unitario' => $costo_unitario, 'costo_total' => $costo_total, 'talla_id' => $talla_id));

        }
        return redirect()->route('Entrada-Terminados.show', $entrada->id)->with('status', 'Entrada Creada Correctamente');
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
        $entrada = Entrada_Productos_Terminados::find($id);
        foreach ($entrada->productos as $key => $producto) {
            $talla_id = $producto->pivot->talla_id;
            $tallas[$key] = Talla_Producto::where('id',$talla_id)->value('talla');
        }
        return view('entradast.show',compact('entrada','tallas'));
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
        $entrada = Entrada_Productos_Terminados::find($id);
        $usuariosT = UsuarioT::all();
        $maquileros =Maquileros::all();
        $produccion = Tproduccion::all();

        return view('entradast.edit',compact('entrada','usuariosT','maquileros','produccion'));
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
        $entrada = Entrada_Productos_Terminados::find($id);
        $entrada->numero_entrada = $request->cve_factura;
        $entrada->empleado_id = $request->usuarioT_id;
        $entrada->numero_piezas = $request->piezas;
        $entrada->tipo_produccion_id = $request->tipo_id;
        $entrada->maquilero_id = $request->maquilero_id;
        $entrada->update();

        return "Actualizado";

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
