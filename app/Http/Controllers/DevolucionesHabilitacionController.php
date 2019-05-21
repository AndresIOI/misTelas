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
use App\Devolucion_Habilitacion;
use App\Http\Requests\StoreDevolucionHabilitacionRequest;

class DevolucionesHabilitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function clasificacion($id){
        $entrada_id = Entrada_Habilitacion::where('ordenCompra',$id)->value('id');
        $habilitaciones_entrada = Entrada_Habilitacion::find($entrada_id)->habilitacions;
        $proveedor = Entrada_Habilitacion::find($entrada_id)->proveedor;
        foreach ($habilitaciones_entrada as $key => $habilitacion) {
            $clasificaciones[$key] = $habilitacion->tipoHabilitacion->clasificacion;
        }
        return $datos = ['clasificaciones' => $clasificaciones, 'proveedor' => $proveedor];
    }

    public function tipo($id,$orden_compra){
        $entrada_id = Entrada_Habilitacion::where('ordenCompra',$orden_compra)->value('id');
        $habilitaciones_entrada = Entrada_Habilitacion::find($entrada_id)->habilitacions;
        $key = 0;
        foreach ($habilitaciones_entrada as $habilitacion) {
            if($habilitacion->tipoHabilitacion->clasificacion->id == $id){
                $tipos[$key] = $habilitacion->tipoHabilitacion;
                $key++;
            }
        }
        return Array_unique($tipos);
    }

    public function clave($id,$orden_compra){
        $entrada_id = Entrada_Habilitacion::where('ordenCompra',$orden_compra)->value('id');
        $habilitaciones_entrada = Entrada_Habilitacion::find($entrada_id)->habilitacions;
        $key = 0;
        foreach ($habilitaciones_entrada as $habilitacion) {
            if($habilitacion->tipoHabilitacion->id == $id){
                $claves[$key] = $habilitacion;
                $key++;
            }
        }
        return Array_unique($claves);
    }

    public function detalles($id,$orden_compra){
        $detalles = Habilitacion::find($id);
        $cantidad_inventario = Inventario_Habilitaciones::where('habilitacion_id',$detalles->id)->value('cantidad_inventario');
        return $datos = ['detalles' => $detalles, 'cantidad_inventario' =>$cantidad_inventario];
    }

    public function index()
    {
        //
        $devoluciones_habilitacion = Devolucion_Habilitacion::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6){
            return view('devolucionesh.index',compact('devoluciones_habilitacion'));
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
        $tipos_habilitaciones = TipoHabilitacion::all();
        $clasificaciones = Clasificacion::all();
        $entradas = Entrada_Habilitacion::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 ){
            return view('devolucionesh.create',compact('clasificaciones','tipos_habilitaciones','entradas'));
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
    public function store(StoreDevolucionHabilitacionRequest $request)
    {
        //
        $entrada_id = Entrada_Habilitacion::where('ordenCompra',$request->orden_compra)->value('id');
        $devolucion = new Devolucion_Habilitacion();
        $devolucion->entrada_id = $entrada_id;
        $devolucion->usuario_id = Auth::user()->id;
        $devolucion->save();
        for ($i=0; $i < count($request->clasificacion); $i++) { 
            $clave_habilitacion = implode('',$request->clavehabilitacion[$i]);
            $cantidad_habilitacion = implode('',$request->CantidadUnidadesReingreso[$i]);


            $habilitacion_id = Habilitacion::where('clave',$clave_habilitacion)->value('id');
            $habilitacion_inventario = Inventario_Habilitaciones::where('habilitacion_id',$habilitacion_id)->first();
            $cantidad_inventario = Inventario_Habilitaciones::where('habilitacion_id',$habilitacion_id)->value('cantidad_inventario');
            $habilitacion_inventario->cantidad_inventario = $cantidad_inventario - $cantidad_habilitacion;
            $habilitacion_inventario->save();

            $devolucion->habilitacions()->attach($habilitacion_id,array('cantidad' => $cantidad_habilitacion));
        }

        //return redirect()->route('Devolucion-Habilitacion.show',$devolucion->id);
        return redirect()->route('Devolucion-Habilitacion.show', [$devolucion->id])->with('status', 'Devolución Creada Correctamente');
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
        $devolucion = Devolucion_Habilitacion::find($id);
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6 ){
            return view('devolucionesh.show',compact('devolucion'));
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
