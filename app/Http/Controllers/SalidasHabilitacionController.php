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
use App\Inventario_Habilitaciones;  
use App\Salida_Habilitacion;
use App\Http\Requests\StoreSalidaHabilitacionRequest;

class SalidasHabilitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function byContador($numR){
        $contador = Salida_Habilitacion::where('numero_requisicion',$numR)->value('contador');
        return $contador;
    }

    public function byReiniciarContadorSalida($numRequisicion){
        $id = Salida_Habilitacion::where('numero_requisicion',$numRequisicion)->value('id');
        $salida = Salida_Habilitacion::find($id);
        $salida->contador = 0;
        $salida->contador_activo = true;
        $salida->save();
        $contador = Salida_Habilitacion::where('numero_requisicion',$numRequisicion)->value('contador');
        return $contador;
    }
    public function index()
    {
        //
        $salidas_habilitacion = Salida_Habilitacion::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6){
            return view('salidash.index',compact('salidas_habilitacion'));
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
        $habilitaciones_inventario = Inventario_Habilitaciones::all();
        foreach ($habilitaciones_inventario as $key => $habilitacion_inventario) {
            $clasificaciones[$key] = $habilitacion_inventario->habilitacion->tipoHabilitacion->clasificacion;
        }
        $clasificaciones = array_unique($clasificaciones);
        $empaques = Empaque::all();
          if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 ){
            return view('salidash.create',compact('fecha','empleadosCH','nombre_proveedorH','tipos_habilitaciones','empaques','clasificaciones'));
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
    public function store(StoreSalidaHabilitacionRequest $request)
    {
        //
        $contador = Salida_Habilitacion::where('numero_requisicion',$request->numRequisicion)->value('contador');
        $contadorActivado = Salida_Habilitacion::where('numero_requisicion',$request->numRequisicion)->value('contador_activo');

        if(($contador < 3 && $contador > 0) || ($contador < 3 && $contador >= 0 && $contadorActivado == true)){
            $idSalida = Salida_Habilitacion::where('numero_requisicion',$request->numRequisicion)->value('id');
            $salida = Salida_Habilitacion::find($idSalida);
            $salida->contador++;
            $salida->importe_total_salida += $request->importeSalida;
            $salida ->save();

        }elseif($contador >= 3){
            return redirect()->route('Salida-Habilitacion.index')->with('errorContador', 'No se puedo realizar la salida. 
            Error: Alcanzo el maximo de salidas posibles de un numero de requisicion'); 
        }elseif($contador == 0){
            $salida = new Salida_Habilitacion();
            $salida->numero_requisicion = $request->numRequisicion;
            $salida->piezas = $request->piezas;
            $salida->contador++;
            $salida->importe_total_salida = $request->importeSalida;
            $salida->usuario_id = Auth::user()->id;
            $salida->save();
        }

        for ($i=0; $i < count($request->clasificacion); $i++) { 
            $clave_habilitacion = implode('',$request->clavehabilitacion[$i]);
            $cantidad_habilitacion = implode('',$request->CantidadUnidades[$i]);
            $precio_unitario_habilitacion = implode('',$request->PrecioU[$i]);
            $importe_habilitacion = implode('',$request->Costo[$i]);

            $habilitacion_id = Habilitacion::where('clave',$clave_habilitacion)->value('id');
            $habilitacion_inventario = Inventario_Habilitaciones::where('habilitacion_id',$habilitacion_id)->first();
            $cantidad_inventario = Inventario_Habilitaciones::where('habilitacion_id',$habilitacion_id)->value('cantidad_inventario');
            $habilitacion_inventario->cantidad_inventario = $cantidad_inventario - $cantidad_habilitacion;
            $habilitacion_inventario->save();

            $salida->habilitacions()->attach($habilitacion_id,array('precio_unitario' => $precio_unitario_habilitacion, 'precio_total' => $importe_habilitacion, 'cantidad' => $cantidad_habilitacion));
        }

        //return redirect()->route('Salida-Habilitacion.show', $salida->id);
        return redirect()->route('Salida-Habilitacion.show', [$salida->id])->with('status', 'Salida Creada Correctamente');

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
        $salida_habilitacion = Salida_Habilitacion::find($id);
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6 ){
            return view('salidash.show',compact('salida_habilitacion'));
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
        $salida = Salida_Habilitacion::find($id);
        return view('salidash.edit',compact('salida'));
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
        $salida = Salida_Habilitacion::find($id);
        $salida->numero_requisicion = $request->num_req;
        $salida->piezas = $request->piezas;
        $salida->update();
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
