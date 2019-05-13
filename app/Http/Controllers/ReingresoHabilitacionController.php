<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clasificacion;
use App\TipoHabilitacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Salida_Habilitacion;
use App\Reingreso_Habilitacion;
use App\Habilitacion;
use App\Inventario_Habilitaciones;
use App\Http\Requests\StoreReingresoHabilitacionRequest;

class ReingresoHabilitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function clasificacionHabilitacion($id){
        $id_salida_habilitacion = Salida_Habilitacion::where('numero_requisicion',$id)->value('id');
        $habilitaciones = Salida_Habilitacion::find($id_salida_habilitacion)->habilitacions;
        foreach ($habilitaciones as $habilitacion) {
            $clasificaciones[] = $habilitacion->tipoHabilitacion->clasificacion->id;
        }
        $clasificaciones_ids = array_unique($clasificaciones);

        foreach ($clasificaciones_ids as $p) {
            $clasificacion = Clasificacion::where('id',$p)->value('clasificacion');
            $data[] = ['id' => $p, 'clasificacion' => $clasificacion];
		
        }
        return $data;
    } 

    public function tipoHabilitacion($id,$numero_requisicion){
        $id_salida_habilitacion = Salida_Habilitacion::where('numero_requisicion',$numero_requisicion)->value('id');
        $habilitaciones = Salida_Habilitacion::find($id_salida_habilitacion)->habilitacions;
        $key = 0;
        foreach ($habilitaciones as $habilitacion) {
            if($habilitacion->tipoHabilitacion->clasificacion->id == $id){
                $tipos[$key] = $habilitacion->tipoHabilitacion;
                $key++;
            }
        }
        return Array_unique($tipos);
    }

    public function habilitacion($id,$numero_requisicion){
        $id_salida_habilitacion = Salida_Habilitacion::where('numero_requisicion',$numero_requisicion)->value('id');
        $habilitaciones = Salida_Habilitacion::find($id_salida_habilitacion)->habilitacions;
        $key = 0;
        foreach ($habilitaciones as $habilitacion) {
            if($habilitacion->tipoHabilitacion->id == $id){
                $claves[$key] = $habilitacion;
                $key++;
            }
        }
        return $claves;
    }

    public function habilitacionDescripcion($id,$numero_requisicion){
        $id_salida_habilitacion = Salida_Habilitacion::where('numero_requisicion',$numero_requisicion)->value('id');
        $habilitaciones = Salida_Habilitacion::find($id_salida_habilitacion)->habilitacions;
        $key = 0;
        foreach ($habilitaciones as $habilitacion) {
            if($habilitacion->id == $id){
                $datos[$key] = $habilitacion;
            }
        }
        return Array_unique($datos);
    }

    public function index()
    {
        //
        $reingresos_habilitacion = Reingreso_Habilitacion::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6){
            return view('reingresosh.index',compact('reingresos_habilitacion'));
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
          
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 ){
            return view('reingresosh.create',compact('clasificaciones','tipos_habilitaciones'));
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
    public function store(StoreReingresoHabilitacionRequest $request)
    {
        //      
        $reingreso = new Reingreso_Habilitacion();
        $reingreso->numero_requisicion = $request->num_requisicion;
        $reingreso->usuario_id = Auth::user()->id;
        $reingreso->save();
        $salida_id = Salida_Habilitacion::where('numero_requisicion',$request->num_requisicion)->value('id');

        for ($i=0; $i < count($request->clasificacion); $i++) { 
            $clave_habilitacion = implode('',$request->clavehabilitacion[$i]);
            $cantidad_habilitacion = implode('',$request->CantidadUnidadesReingreso[$i]);


            $habilitacion_id = Habilitacion::where('clave',$clave_habilitacion)->value('id');
            $habilitacion_inventario = Inventario_Habilitaciones::where('habilitacion_id',$habilitacion_id)->first();
            $cantidad_inventario = Inventario_Habilitaciones::where('habilitacion_id',$habilitacion_id)->value('cantidad_inventario');
            $habilitacion_inventario->cantidad_inventario = $cantidad_inventario + $cantidad_habilitacion;
            $habilitacion_inventario->save();

            $salida_habilitacion = Salida_Habilitacion::find($salida_id);
            $habilitaciones_salida = $salida_habilitacion->habilitacions;
            foreach ($habilitaciones_salida as $key => $habilitacion) {
                if($habilitacion->id == $habilitacion_id){
                     $cantidad_salida = $habilitacion->pivot->cantidad;
                    $habilitacion->pivot->cantidad = $cantidad_salida - $cantidad_habilitacion;
                    $habilitacion->pivot->save();
                }
            }

            $reingreso->habilitacions()->attach($habilitacion_id,array('cantidad' => $cantidad_habilitacion));
        }

        //return redirect()->route('Reingreso-Habilitacion.show',$reingreso->id);
        return redirect()->route('Reingreso-Habilitacion.show', [$reingreso->id])->with('status', 'Reingreso Creado Correctamente');
        

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
        $reingreso = Reingreso_Habilitacion::find($id);
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6 ){
            return view('reingresosh.show',compact('reingreso'));
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
