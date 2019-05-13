<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salida;
use App\Salida_Tela;
use App\Reingreso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\tela_color_cantidad;
use App\Colores;
use App\Tela;
use App\Tipo_Tela;
use App\Http\Requests\StoreReingresoRequest;

class ReingresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reingresos = Reingreso::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6){
            return view('reingresos.index',compact('reingresos'));
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
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3){
            return view('reingresos.create');
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
    public function store(StoreReingresoRequest $request)
    {
        //
        $reingreso = new Reingreso();
        $idSalida = Salida::where('numeroRequisicion',$request->num_requisicion)->avg('id');
        $reingreso->numeroRequisicion = $idSalida;
        $reingreso->usuario_id = Auth::user()->id;
        $reingreso->save();

        $sync_data = [];
        for ($i=0; $i < count($request->t_tela); $i++) { 
            $cve = implode('',$request->clave_tela[$i]);
            $colorAtt = implode('',$request->color[$i]);
            $cantidadReingreso = implode('',$request->cantidadReingreso[$i]);

            $color = Colores::where('color',$colorAtt)->get(array('id_color'));
            foreach ($color as $key => $colorId) {
                $colorId->id_color;
            }
            $id_color = $colorId->id_color;
            $consulta = tela_color_cantidad::where([
                ['color' , $id_color],
                ['tela_id' , $cve]
            ])->get(array('id'));
            foreach ($consulta as $consult) {
                $consult->id;
            }
            $id = $consult->id;
            
            $actualizacionTela = tela_color_cantidad::find($id);
            $cantidadConsulta = tela_color_cantidad::where('id',$id)->get(array('cantidad'));
            foreach ($cantidadConsulta as $valor) {
                $valor->cantidad;
            }
            $cantidadConsultaMap = $valor->cantidad;
            
            $nuevaCantidad = $cantidadConsultaMap + $cantidadReingreso;
            
            $actualizacionTela->cantidad = $nuevaCantidad;
            $consultaCantidadSalida = Salida_Tela::where([
                ['color' , $colorAtt],
                ['tela_id' , $cve],
                ['numRequisicion',$idSalida]
            ])->get(array('id'));
            foreach ($consultaCantidadSalida as $consultID) {
                $consultID->id;
            }
            $idSalida = $consultID->id;;
            $actualizacionCantidadSalida = Salida_Tela::find($idSalida);
            $cantidadSalidaConsulta = Salida_Tela::where('id',$id)->get(array('cantidadSalida'));
            foreach ($cantidadSalidaConsulta as $valors) {
                $valors->cantidadSalida;
            }
            $cantidadConsultaMapSalida = $valors->cantidadSalida;


            $nuevaCantidadSalida = $cantidadConsultaMapSalida - $cantidadReingreso;
            $actualizacionCantidadSalida->cantidadSalida = $nuevaCantidadSalida;

            $actualizacionCantidadSalida->save();
            $actualizacionTela->save();
            $reingreso->telas()->attach($cve,array('cantidadReingreso' => $cantidadReingreso, 'color' => $colorAtt));


        }
        return redirect()->route('Reingreso-Tela.show', [$reingreso])->with('status', 'Reingreso Almacenado Correctamente');

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
        $reingreso = Reingreso::where('id_reingreso',$id)->get();
        foreach ($reingreso as $dato) {
            $num_requisicion = Salida::where('id',$dato->numeroRequisicion)->value('numeroRequisicion');
            $datosReingreso = ['numeroReingreso' => $dato->id_reingreso, 'numeroRequisicion'=>$num_requisicion,'fecha'=>$dato->created_at->toDateTimeString()];
        }
        $telas = DB::table('reingresos_telas')->where('id_reingreso',$id)->get();
        foreach ($telas as $key => $tela) {
            $ids_tipoTelas = Tela::where('id',$tela->tela_id)->get();
            foreach ($ids_tipoTelas as$id_tT) {
                $cve = $id_tT->cve_tela;
                $idTipoTela = $id_tT->tipo_tela;
            }
            $tiposTelas = Tipo_Tela::where('id_tipo_tela',$idTipoTela)->get(array('tipo_tela'));
            foreach ($tiposTelas as  $nombre) {
                $nombreTipoTela = $nombre->tipo_tela;
            }
            $datosTelas[$key] = ['tipo_tela' => $nombreTipoTela,'cve_tela' => $cve,'color'=>$tela->color,'cantidad'=>$tela->cantidadReingreso];
            # code...
        }
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6){
            return view('reingresos.show', compact('datosReingreso','datosTelas'));
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
