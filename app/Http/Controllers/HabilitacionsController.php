<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario_Habilitaciones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\TipoHabilitacion;
use App\Habilitacion;
use App\Http\Requests\HabilitacionCreateRequest;

class HabilitacionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $habilitaciones_inventario = Inventario_Habilitaciones::all();
        foreach ($habilitaciones_inventario as $key => $habilitacion) {
            $contador = 0;
            $precio = 0;
            foreach ($habilitacion->habilitacion->entradas as $habilitacion_precio) {
                $precio += $habilitacion_precio->pivot->precio_unitario; 
                $contador++;
            }
            $precio_unitario_promedio = $precio/$contador;
            $inventario[$key] = $habilitacion;
            $precios[$key] = $precio_unitario_promedio;
            $precio_total_inventario += $precio_unitario_promedio*$habilitacion->cantidad_inventario;
        }
        
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6 ){
            return view('Inventario.indexH',compact('inventario','precios','precio_total_inventario'));
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
        $tipos = TipoHabilitacion::all();
        return view('habilitaciones.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabilitacionCreateRequest $request)
    {
        //
        $habilitacion = new Habilitacion();
        $habilitacion->clave = $request->clave;
        $habilitacion->descripcion = $request->descripcion;
        $habilitacion->unidad = $request->unidad;
        $habilitacion->tipo_habilitacion_id = $request->tipo_id;
        $habilitacion->save();

        return redirect()->route('habilitaciones-index');

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
        $habilitacion = Habilitacion::find($id);
        $tipos = TipoHabilitacion::all();

        return view('habilitaciones.edit',compact('habilitacion','tipos'));
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
            'clave' => 'required|unique:habilitacions,clave,'.$id,
            'descripcion' => 'required',
            'tipo_id' => 'required',
            'unidad' => 'required'
        ]);
        $consulta = Habilitacion::where([
            ['clave', $request->clave],
            ['unidad', $request->unidad],
            ['tipo_habilitacion_id', $request->tipo_id]
        ])->get();
        if ($consulta->isEmpty()) {
            $habilitacion = Habilitacion::find($id);
            $habilitacion->clave = $request->clave;
            $habilitacion->descripcion = $request->descripcion;
            $habilitacion->unidad = $request->unidad;
            $habilitacion->tipo_habilitacion_id = $request->tipo_id;
            $habilitacion->update();
    
            return redirect()->route('habilitaciones-index')->with('status','Se actualizo correctamente la HABILITACION');
        }else{
            return redirect()->route('habilitaciones-index')->with('fail','No se pudo actualizar la HABILITACION, ya que existe un registro con las mismas caracteristicas');

        }

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
        $habilitacion = Habilitacion::find($id);
        if($habilitacion->entradas->count() > 0 || $habilitacion->salidas->count() > 0 || $habilitacion->reingresos->count() > 0 || $habilitacion->devoluciones->count() > 0){
            return redirect()->route('habilitaciones-index')->with('fail','No se pudo borrar la Habilitacion debido a que tiene algun registro de Entrada, Salida, Devolucion o Reingreso');
        }else{
            $habilitacion->delete();
            return redirect()->route('habilitaciones-index')->with('status','Habilitacion borrada exitosamente');
        }
    }

    public function indexHabilitaciones(){
        $habilitaciones = Habilitacion::all();
        return view('habilitaciones.index',compact('habilitaciones'));
    }
}
