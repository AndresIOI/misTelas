<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\HabilitacionUsuariosOrden;
use App\HabilitacionProveedor;
use App\Clasificacion;
use App\TipoHabilitacion;
use App\Habilitacion;
use App\Empaque;
use App\Entrada_Habilitacion;   
use App\Inventario_Habilitaciones;
use App\Http\Requests\StoreEntradaHabilitacionRequest;

class EntradasHabilitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tipoHabilitacion($id,$ruta){
        if($ruta == "entrada"){
            $clasificacion = Clasificacion::find($id);
            return $clasificacion->tiposHabilitacion;
        }else if($ruta == "salida"){
            $inventario_habilitaciones = Inventario_Habilitaciones::all();
            $key = 0;
            foreach ($inventario_habilitaciones as  $inventario_habilitacion) {  
                if($inventario_habilitacion->habilitacion->tipoHabilitacion->clasificacion_id == $id){
                    $tipos_habilitacion[$key] = $inventario_habilitacion->habilitacion->tipoHabilitacion;
                    $key++;
                }
            }
            return array_unique($tipos_habilitacion); 
        }else if ($ruta == "reingreso") {
            $inventario_habilitaciones = Inventario_Habilitaciones::all();
            $key = 0;
            foreach ($inventario_habilitaciones as  $inventario_habilitacion) {  
                if($inventario_habilitacion->habilitacion->tipoHabilitacion->clasificacion_id == $id){
                    $tipos_habilitacion[$key] = $inventario_habilitacion->habilitacion->tipoHabilitacion;
                    $key++;
                }
            }
            return array_unique($tipos_habilitacion);
        }
    }

    public function habilitaciones($id,$ruta){
        if($ruta == "entrada"){
            $tipo_habilitacion = tipoHabilitacion::find($id);
            return $tipo_habilitacion->habilitaciones;
        }else if($ruta == "salida"){
            $inventario_habilitaciones = Inventario_Habilitaciones::all();
            $key = 0;
            foreach ($inventario_habilitaciones as  $inventario_habilitacion) {  
                if($inventario_habilitacion->habilitacion->tipoHabilitacion->id == $id){
                    $habilitaciones[$key] = $inventario_habilitacion->habilitacion;
                    $key++;
                }
            }
            return $habilitaciones;
        }
    }

    public function DetallesHabilitacion($id,$ruta){
        if($ruta == "entrada"){
            return Habilitacion::find($id);
        }else if($ruta == "salida"){
            $inventario_habilitaciones = Inventario_Habilitaciones::all();
            $key = 0;
            $contador_precios = 0;
            foreach ($inventario_habilitaciones as  $inventario_habilitacion) { 
                $precios = DB::table('entrada_habilitacion')->where('habilitacion_id',$id)->get(array('precio_unitario'));
                foreach ($precios as $precio) {
                    $precio_total += $precio->precio_unitario;
                    $contador_precios++;
                }
                $promedio_consto_unitario = $precio_total/$contador_precios;
                if($inventario_habilitacion->habilitacion_id == $id){
                    $datos[$key] = ['descripcion' => $inventario_habilitacion->habilitacion->descripcion, 
                                    'unidad' => $inventario_habilitacion->habilitacion->unidad, 
                                    'cantidad_inventario' => $inventario_habilitacion->cantidad_inventario,
                                    'precio_unitario' => $promedio_consto_unitario];
                    $key++;
                }
            }
            return $datos;
        }
    }

    public function index()
    {
        $entradas_habilitacion = Entrada_Habilitacion::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6){
            return view('entradash.index',compact('entradas_habilitacion'));
            // return $entrada_habilitacion;
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
        $empleadosCH = HabilitacionUsuariosOrden::all();
        $nombre_proveedorH = HabilitacionProveedor::all();
        $tipos_habilitaciones = TipoHabilitacion::all();
        $clasificaciones = Clasificacion::all();
        $empaques = Empaque::all();

          if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 ){
            return view('entradash.create',compact('fecha','empleadosCH','nombre_proveedorH','clasificaciones','tipos_habilitaciones','empaques'));
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
    public function store(StoreEntradaHabilitacionRequest $request)
    {

        $entrada =  new Entrada_Habilitacion();
        $entrada->ordenCompra = $request->num_entrada;
        $entrada->claveFactura = $request->cve_factura;
        $entrada->fecha = $request->fecha;
        $entrada->OperarioRecepcion = $request->OperarioRecepcion;
        $entrada->operarioCompra = $request->usuarioCompras;
        $entrada->proveedor_id = $request->proveedor;
        $entrada->save();

        for ($i=0; $i < count($request->clasificacion); $i++) { 
            $clave_habilitacion = implode('',$request->clavehabilitacion[$i]);
            $empaque_habilitacion = implode('',$request->empaque[$i]);
            $cantidad_habilitacion = implode('',$request->CantidadUnidades[$i]);
            $precio_unitario_habilitacion = implode('',$request->PrecioU[$i]);
            $importe_habilitacion = implode('',$request->Costo[$i]);

            $habilitacion_id = Habilitacion::where('clave',$clave_habilitacion)->value('id');
            $empaque_id = Empaque::where('empaque',$empaque_habilitacion)->value('id');

            $consulta_inventario = DB::table('inventario_habilitaciones')->where('habilitacion_id',$habilitacion_id)->get();

            if($consulta_inventario->isEmpty()){
                $entrada_inventario = new Inventario_Habilitaciones();
                $entrada_inventario->habilitacion_id = $habilitacion_id;
                $entrada_inventario->cantidad_inventario = $cantidad_habilitacion;
                $entrada_inventario->save();
            }else{
                $habilitacion_inventario = Inventario_Habilitaciones::where('habilitacion_id',$habilitacion_id)->first();
                $cantidad_inventario = Inventario_Habilitaciones::where('habilitacion_id',$habilitacion_id)->value('cantidad_inventario');
                $habilitacion_inventario->cantidad_inventario = $cantidad_inventario + $cantidad_habilitacion;
                $habilitacion_inventario->save();
            }

            $entrada->habilitacions()->attach($habilitacion_id,array('empaque_id' => $empaque_id, 'precio_unitario' => $precio_unitario_habilitacion, 'precio_total' => $importe_habilitacion, 'cantidad' => $cantidad_habilitacion));

        }
        return redirect()->route('Entrada-Habilitacion.show', $entrada->id)->with('status', 'Entrada Creada Correctamente');
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
        $entrada_habilitacion = Entrada_Habilitacion::find($id);
        foreach ($entrada_habilitacion->habilitacions as $key => $habilitacion) {
            $empaque_id = $habilitacion->pivot->empaque_id;
            $empaques[$key] = Empaque::where('id',$empaque_id)->value('empaque');
        }

        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6 ){
            return view('entradash.show',compact('entrada_habilitacion','empaques'));
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
        $entrada = Entrada_Habilitacion::find($id);
        $usuariosC = HabilitacionUsuariosOrden::all();
        $proveedores = HabilitacionProveedor::all();
        return view('entradash.edit',compact('entrada','proveedores','usuariosC'));
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
        $entrada = Entrada_Habilitacion::find($id);
        $entrada->ordenCompra = $request->clave_entrada;
        $entrada->claveFactura = $request->clave_factura;
        $entrada->OperarioRecepcion = $request->operario;
        $entrada->operarioCompra = $request->usuarioC_id;
        $entrada->proveedor_id = $request->proveedor_id;
        $entrada->update();

        return redirect()->route('Entrada-Habilitacion.show', $entrada->id)->with('status', 'Entrada actualizada correctamente');

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