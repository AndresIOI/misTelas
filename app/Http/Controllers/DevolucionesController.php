<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Entrada;
use App\Devolucion;
use App\Proveedor;
use Illuminate\Support\Facades\DB;
use App\Tipo_Tela;
use App\Tela;
use App\Colores;
use App\tela_color_cantidad;
use App\Http\Requests\StoreDevolucionRequest;


class DevolucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dovoluciones = Devolucion::all();
        
        foreach ($dovoluciones as $key => $devolucion) {
            $proveedor = Proveedor::where('id',$devolucion->id_proveedor)->get(array('nombreProveedor'));
            foreach ($proveedor as $key => $value) {
                $nombreProveedor = $value->nombreProveedor;
            }
            $entrada = Entrada::where('id',$devolucion->ordenCompra)->get();
            foreach ($entrada as $key => $dato) {
                $numeroEntrada = $dato->num_entrada;
                $cveFactura = $dato->cve_factura;
            }
            $devolucion->ordenCompra = $numeroEntrada;
            $devolucion->id_usuario = $cveFactura;
            $devolucion->id_proveedor = $nombreProveedor;
        }

        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6 ){
             return view('devoluciones.index',compact('dovoluciones'));
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
        $entradas = Entrada::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3){
            return view('devoluciones.create2',compact('entradas'));
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
    public function store(StoreDevolucionRequest $request)
    {
        //
        $devolucion = new Devolucion();
        $ids_ordenCompra = Entrada::where('num_entrada',$request->orden_compra)->get();
        foreach ($ids_ordenCompra as $id) {
            $id->id;   
        }
        $id_entrada = $id->id;
        $devolucion->ordenCompra = $id_entrada;
        $devolucion->id_usuario = Auth::user()->id;
        $devolucion->save();

        $sync_data = [];
        for ($i=0; $i < count($request->t_tela); $i++) { 
            $cve = implode('',$request->clave_tela[$i]);
            $colorAtt = implode('',$request->color[$i]);
            $cantidadDevolucion = implode('',$request->cantidadReingreso[$i]);
            $sync_data[$cve] = ['cantidadDevolucion' => $cantidadDevolucion, 'color' => $color];

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
            
            $nuevaCantidad = $cantidadConsultaMap - $cantidadDevolucion;
            
            $actualizacionTela->update(['cantidad'=>$nuevaCantidad]);

            $devolucion->telas()->attach($cve,array('cantidadDevolucion' => $cantidadDevolucion, 'color' => $colorAtt));
        }
            return redirect()->route('Devolucion-Tela.show', [$devolucion])->with('status', 'Devolucion Almacenada Correctamente');
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
        $devolucion = Devolucion::where('id_devolucion',$id)->get();
        foreach ($devolucion as $dato) {
            $proveedor = Proveedor::where('id',$dato->id_proveedor)->get(array('nombreProveedor'));
            foreach ($proveedor as $key => $value) {
                $nombreProveedor = $value->nombreProveedor;
            }
            $entrada = Entrada::where('id',$dato->ordenCompra)->get();
            foreach ($entrada as $key => $dato) {
                $numeroEntrada = $dato->num_entrada;
                $cveFactura = $dato->cve_factura;
                $id_proveedor = $dato->id_proveedor;
                $proveedor = Proveedor::where('id',$id_proveedor)->get();
                foreach ($proveedor as $value) {
                    $nombreProveedor = $value->nombreProveedor;
                }
            }
            $datosDevolucion = ['id_devolucion' => $id, 'ordenCompra'=>$numeroEntrada,'proveedor'=>$nombreProveedor,'factura'=>$cveFactura,'fecha'=>$dato->created_at->toDateTimeString()];
        }
        $telas = DB::table('devolucion_tela')->where('id_devolucion',$id)->get();
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
            $datosTelas[$key] = ['tipo_tela' => $nombreTipoTela,'cve_tela' => $cve,'color'=>$tela->color,'cantidad'=>$tela->cantidadDevolucion];
            # code...
        }

        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6 ){
            return view('devoluciones.show', compact('datosDevolucion','datosTelas'));
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
