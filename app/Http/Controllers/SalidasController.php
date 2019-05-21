<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\tela_color_cantidad;
use App\Tipo_Tela;
use App\Salida;
use App\Colores;
use App\Tela;
use App\Http\Requests\StoreSalidaRequest;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byChecarContadorSalida($numRequisicion){
        $contador = Salida::where('numeroRequisicion',$numRequisicion)->avg('contador');
        return $contador;

    }
    public function byReiniciarContadorSalida($numRequisicion){
        $id = Salida::where('numeroRequisicion',$numRequisicion)->avg('id');
        $salida = Salida::find($id);
        $salida->contador = 0;
        $salida->contadorActivado = true;
        $salida->save();
        $contador = Salida::where('numeroRequisicion',$numRequisicion)->avg('contador');
        return $contador;

    }
    public function index()
    {
        $salidas = Salida::all();

        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6){
            return view('salidas.index',compact('salidas'));
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
        $tiposTela = Tipo_Tela::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3){
            return view('salidas.create',compact('tiposTela'));
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
    public function store(StoreSalidaRequest $request)
    {
        //
        $contador = Salida::where('numeroRequisicion',$request->numRequisicion)->avg('contador');
        $contadorActivado = Salida::where('numeroRequisicion',$request->numRequisicion)->get();
        foreach ($contadorActivado as $v) {
            $activado = $v->contadorActivado;
        }

        if(($contador < 3 && $contador > 0) || ($contador < 3 && $contador >= 0 && $activado == true)){
            $idSalida = Salida::where('numeroRequisicion',$request->numRequisicion)->avg('id');
            $salida = Salida::find($idSalida);
            $salida->contador++;
            $salida->importeTotalSalida += $request->importeSalida;
            $salida ->save();

        }elseif($contador >= 3){
            return redirect()->route('Salida-Tela.index')->with('errorContador', 'No se puedo realizar la salida. 
            Error: Alcanzo el maximo de salidas posibles de un numero de requisicion'); 
        }elseif($contador == 0){
            $salida = new Salida();
            $salida->numeroRequisicion = $request->numRequisicion;
            $salida->usuario_id = Auth::user()->id;
            $salida->piezas = $request->piezas;
            $salida->contador++;
            $salida->importeTotalSalida = $request->importeSalida;
            $salida->contadorActivado = false;
            $salida->save();
        }
        for ($i=0; $i < count($request->t_tela); $i++) { 
            $cve = implode('',$request->clave_tela[$i]);
            $colorAt = implode('',$request->color[$i]);
            $cantidadSalida = implode('',$request->cantidadSalida[$i]);
            $precioUnitario = implode('',$request->precioUnitario[$i]);
            $importeTela = implode('',$request->importeTotal[$i]);

            $color = Colores::where('color',$colorAt)->get(array('id_color'));
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
            
            $nuevaCantidad = $cantidadConsultaMap - $cantidadSalida;
            
            $actualizacionTela->cantidad = $nuevaCantidad;
            $actualizacionTela->save();
            $salida->telas()->attach($cve,array('cantidadSalida' => $cantidadSalida, 'color' => $colorAt, 'precioUnitario' => $precioUnitario, 'importeTotal' =>$importeTela));

        }
        return redirect()->route('Salida-Tela.show',[$salida->numeroRequisicion])->with('status', 'Salida Almacenada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datosSalida = [];
        $salida = Salida::where('numeroRequisicion',$id)->get();
        foreach ($salida as $key => $datos) {
            $datosSalida = ['id'=>$datos->id,'numeroRequisicion'=>$datos->numeroRequisicion,'piezas'=>$datos->piezas,'fechaSalida'=>$datos->created_at->toDateTimeString(),'contador'=>$datos->contador,'importeTotal' =>$datos->importeTotalSalida];
        }
        $telas = DB::table('salida_tela')->where('numRequisicion',$datosSalida['id'])->get();
        foreach ($telas as $key => $tela) {
            $ids_tipoTelas = Tela::where('id',$tela->tela_id)->get();
            foreach ($ids_tipoTelas as$id_tT) {
                $idTipoTela = $id_tT->tipo_tela;
                $cve = $id_tT->cve_tela;
            }
            $tiposTelas = Tipo_Tela::where('id_tipo_tela',$idTipoTela)->get(array('tipo_tela'));
            foreach ($tiposTelas as  $nombre) {
                $nombreTipoTela = $nombre->tipo_tela;
            }
            $datosTelas[$key] = ['tipo_tela' => $nombreTipoTela,'cve_tela' => $cve,'color'=>$tela->color,'cantidad'=>$tela->cantidadSalida,'importeTela'=>$tela->importeTotal,'precioUnitario'=>$tela->precioUnitario];
        }
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6){
            return view('salidas.show', compact('datosSalida','datosTelas'));
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
        $salida = Salida::find($id);
        return view('salidas.edit',compact('salida'));
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
        $salida = Salida::find($id);
        $salida->numeroRequisicion = $request->num_req;
        $salida->piezas = $request->piezas;
        $salida->update();
        
        return redirect()->route('Salida-Tela.show',$salida->numeroRequisicion)->with('status', 'Salida Almacenada Correctamente');
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
