<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Tela;
use App\tela_color_cantidad;
use App\Colores;
use App\Salida_Tela;
use App\Tipo_Tela;
use App\Entrada;
use App\Salida;
use App\Proveedor;
use App\Http\Requests\TelaCreateRequest;



class TelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function byTipoTela($id){
        return Tela::where('tipo_tela',$id)->get();    
    }

    public function byTelaPrecioPromedio($id){
        $cantidad = 0;
        $precioUnitarioTela = DB::table('entrada_tela')->where('tela_id',$id)->get(array('precioUnitario'));
        foreach ($precioUnitarioTela as  $value) {
            $cantidad += $value->precioUnitario;
        }
        $promedio = $cantidad / count($precioUnitarioTela);
        return $promedio;
    }
    public function byTela($id){
        return Tela::where('id',$id)->get();
    }

    public function byTipoTelaSalida($id){
        $telas_ids = [];
        $telas = Tela::where('tipo_tela',$id)->get();
        $i = 0;
        foreach ($telas as $key => $tela) {
            $consulta = tela_color_cantidad::where('tela_id',$tela->id)->get();
            if(!$consulta->isEmpty()){
                $cves = Tela::where('id',$tela->id)->get();
                $telas_ids[$i] = ['id'=>$cves[0]->id,'cve'=>$cves[0]->cve_tela];
                $i++;
            }
        }
        return $telas_ids;
    }

    public function byTelaColores($id){
        $colores = [];
        $consulta = tela_color_cantidad::where('tela_id',$id)->get(array('color'));
        foreach ($consulta as $key => $consult) {
            $consultaColors = Colores::where('id_color',$consult->color)->get(array('color'));
            foreach ($consultaColors as $colors) {
                $colors->color;
            }
            $color = $colors->color;
            $colores[$key] = $color;
        }
        return $colores;
    }

    public function byTelaCantidad($id,$color){
        $consultaColors = Colores::where('color',$color)->get();
        foreach ($consultaColors as $colors) {
            $colors->id_color;
        }
        $id_color = $colors->id_color;
        $cantidad = tela_color_cantidad::where([
            ['tela_id', $id],
            ['color', $id_color]
        ])->get(array('cantidad'));

        foreach ($cantidad as $key => $value) {
            $cantidad = $value->cantidad;
        }

        return $cantidad;
    }

    public function byTipoTelaReingreso($id){
        $idSalida = Salida::where('numeroRequisicion',$id)->avg('id');
        $cves_tela = Salida_Tela::where('numRequisicion',$idSalida)->get(array('tela_id'));
        $cves_array = [];
        $tiposTela_array = [];
        foreach ($cves_tela as $key => $cve_tela) {
            $cve_array[$key] = $cve_tela->cve_tela;
            $tiposTela_ids = Tela::where('id',$cve_tela->tela_id)->get(array('tipo_tela'));
            foreach ($tiposTela_ids as $tipoTela_ids) {
                $tipoTela_ids->tipo_tela;
            }
            $tipoTela_id = $tipoTela_ids->tipo_tela;
            $tiposTela_names = Tipo_Tela::where('id_tipo_tela',$tipoTela_id)->get(array('tipo_tela'));
            foreach ($tiposTela_names as  $tipoTela_names) {
                $tipoTela_names->tipo_tela;
            }
            $nombreTipoTela = $tipoTela_names->tipo_tela;
            $tiposTela_array[$key] =$nombreTipoTela;
        }
        $tiposTela_array = array_unique($tiposTela_array);
        $i = 0;
        foreach ($tiposTela_array as $value) {
            $datos[$i] = $value;
            $i++;
        }
        return $datos;
    }

    public function byCveTelasReingreso($id,$numReq){
        $cves_numReq = [];
        $cves = [];
        $idSalida = Salida::where('numeroRequisicion',$numReq)->avg('id');

        $ids_tela = Tipo_Tela::where('tipo_tela',$id)->get(array('id_tipo_tela'));
        foreach ($ids_tela as  $id_tela) {
            $id_tela->id_tipo_tela;
            $cves_telas = Tela::where('tipo_tela',$id_tela->id_tipo_tela)->get(array('id'));
            foreach ($cves_telas as $key => $cve) {
                $cves[$key] = $cve->id;
            }
        }
        foreach ($cves as $i => $value) {
            $consulta = Salida_Tela::where([
                ['numRequisicion',$idSalida],
                ['tela_id',$value]
            ])->get();
            
            if(!$consulta->isEmpty()){
                $tela = Tela::where('id',$value)->get();
                $cves_numReq[$i] = ["id"=>$tela[0]->id, 'cve'=>$tela[0]->cve_tela];
            }
        }
        $i = 0;
        foreach ($cves_numReq as $otro) {
            $datos[$i] = $otro;
            $i++;
        }
        return $datos;
    }

    public function byTelaColoresReingreso($id,$numReq){
        $colores = [];
        $idSalida = Salida::where('numeroRequisicion',$numReq)->avg('id');
        $consulta = Salida_Tela::where([
            ['tela_id',$id],
            ['numRequisicion',$idSalida]
        ])->get(array('color'));
        foreach ($consulta as $key => $consult) {
            $colores[$key] = $consult->color;
        }
        return $colores = array_unique($colores);;
    }

    public function byTelaCantidadSalida($id,$color,$numReq){
        $idSalida = Salida::where('numeroRequisicion',$numReq)->avg('id');
        $cantidadSalida = Salida_Tela::where([
            ['tela_id', $id],
            ['color', $color],
            ['numRequisicion',$idSalida]
        ])->get(array('cantidadSalida'));

        foreach ($cantidadSalida as $key => $value) {
            $cantidad += $value->cantidadSalida;
        }

        return $cantidad;
    }

    public function byDatosordenCompra($id_request){
        $datos = [];
        $ids_telas;
        $tipos_tela;
        $ordenentrada = Entrada::where('num_entrada',$id_request)->get(array('id'));
        foreach ($ordenentrada as $id) {
            $id_entrada = $id->id;
        }
        $ordenEntradaProveedor = Entrada::where('num_entrada',$id_request)->get(array('id_proveedor'));
        $proveedores = Proveedor::where('id',$ordenEntradaProveedor[0]->id_proveedor)->get(array('nombreProveedor'));
        foreach ($proveedores as $key => $value) {
            $datos[$key]= $value->nombreProveedor;
        }
        $telas_ids = DB::table('entrada_tela')->where('entrada_id',$id_entrada)->get(array('tela_id'));
        foreach ($telas_ids as $i => $tela_id) {
            $ids_telas[$i]  = $tela_id->tela_id;
        }
        foreach ($ids_telas as $y => $id_tela) {
            $tipos_tela = Tela::where('id',$id_tela)->get(array('tipo_tela'));
            foreach ($tipos_tela as $j => $id) {
                $ids_tiposTela[$y] = $id->tipo_tela;
            }
        }
        $k = 1;
        foreach ($ids_tiposTela as  $id_tipoTela) {
            $nombresTipoTela = Tipo_Tela::where('id_tipo_tela',$id_tipoTela)->get(array('tipo_tela'));
            foreach ($nombresTipoTela as $key => $nombre) {
                $datos[$k] = $nombre->tipo_tela;
                $k++;
            }
        }
        $datos = array_unique($datos);
        $e = 0;
        foreach ($datos as $dato) {
            $ordenados[$e] = $dato;
            $e++;
        }
        return $ordenados;
    }
    public function byTipoTelaDevolucion($id,$ordenCompra){
        $telasRespuesta = [];
        $idsTiposTelas = Tipo_Tela::where('tipo_tela',$id)->get(array('id_tipo_tela'));
        foreach ($idsTiposTelas as $r => $telaId) {
            $id_tipoTela[$r] = $telaId->id_tipo_tela;
        }
        $telas = Tela::where('tipo_tela',$id_tipoTela)->get();
        $idsEntradas = Entrada::where('num_entrada',$ordenCompra)->get(array('id'));
        foreach ($idsEntradas as $idEntrada) {
            $id_entrada = $idEntrada->id;
        }
        $i = 0;
        foreach ($telas as $key => $tela) {
            $consulta = DB::table('entrada_tela')->where([
                ['tela_id',$tela->id],
                ['entrada_id',$id_entrada]
            ])->get();
            if(!$consulta->isEmpty()){
                $telasRespuesta[$i] = ['id'=>$tela->id,'cve'=>$tela->cve_tela];
                $i++;
            }
        }
        return $telasRespuesta;
    }

    public function byColorDevolucion($id,$ordenCompra){
        $colores = [];
        $idsEntradas = Entrada::where('num_entrada',$ordenCompra)->get(array('id'));
        foreach ($idsEntradas as $idEntrada) {
            $id_entrada = $idEntrada->id;
        }
        $colors = DB::table('entrada_tela')->where([
            ['entrada_id',$id_entrada],
            ['tela_id',$id]
        ])->get(array('color'));
        foreach ($colors as $key => $color) {
            $colores[$key] = $color->color;
        }
        return $colores;
    }

    public function byCantidadDevolucion($id,$color){
        $consultaColors = Colores::where('color',$color)->get();
        foreach ($consultaColors as $colors) {
            $colors->id_color;
        }
        $id_color = $colors->id_color;
        $cantidad = tela_color_cantidad::where([
            ['tela_id', $id],
            ['color', $id_color]
        ])->get(array('cantidad'));

        foreach ($cantidad as $key => $value) {
            $cantidad = $value->cantidad;
        }

        return $cantidad;

    }
    public function index()
    {
        //
        $inventario = [];
        $importeTotal = 0;
        $cantidadTotal = 0;
        $sumaCantidadUnitario = 0;
        $promedioCantidadUnitario = 0;
        $ptotal = 0;

        $cantidadesImportes = DB::table('entrada_tela')->get();
        foreach ($cantidadesImportes as $key => $importe) {
            
            $numeroCompras[$importe->tela_id][$importe->color] = DB::table('entrada_tela')->where([
                ['tela_id',$importe->tela_id],
                ['color',$importe->color]
                ])->count();
                $preciosUnitario[$importe->tela_id][$importe->color] += $importe->precioUnitario; 
                
            $importeTotal+=$importe->importe;
            $sumaCantidadUnitario += $importe->precioUnitario;
        }
        $promedioCantidadUnitario = $sumaCantidadUnitario/count($cantidadesImportes);

        $cantidadTotalD = DB::table('telas_cantidades_colores')->get(array('cantidad'));
        foreach ($cantidadTotalD as $cantidad) {
            $cantidadTotal+=$cantidad->cantidad;
        }
        $dineroPromedioInventario = $promedioCantidadUnitario * $cantidadTotal; 
        
        // $ptotal = $;

        $telas = DB::table('telas')
                    ->select('telas.tipo_tela','telas_cantidades_colores.*')
                    ->Join('telas_cantidades_colores','telas.id','=','telas_cantidades_colores.tela_id')->get();
                    
        foreach ($telas as $key => $tela) {

            $tipo_tela = Tipo_Tela::where('id_tipo_tela',$tela->tipo_tela)->get();
            $cves = Tela::where('id',$tela->tela_id)->get();
            foreach ($cves as $c) {
                $cve = $c->cve_tela;
            }

            foreach ($tipo_tela as $t_T) {
                
                $nombreTipoTela = $t_T->tipo_tela;
            }

            $color_tela = Colores::where('id_color',$tela->color)->get(array('color'));

            foreach ($color_tela as $c_T) {
                $nombreColorTela = $c_T->color;
            }
            $promedio = $preciosUnitario[$tela->tela_id][$nombreColorTela] / $numeroCompras[$tela->tela_id][$nombreColorTela];
            
            $inventario[$key] = ['tipo_Tela' => $nombreTipoTela,'cve_tela' => $cve,'cantidad' => $tela->cantidad,'color' => $nombreColorTela,'promedioPrecioUnitario' =>$promedio];
        }
        $dineroPromedioInventario= number_format($dineroPromedioInventario);
        $importeTotal= number_format($importeTotal);

        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6 ){
            return view('Inventario.index',compact('inventario','dineroPromedioInventario','importeTotal'));
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
        $tipos = Tipo_Tela::all();
        return view('telas.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelaCreateRequest $request)
    {
        //
        $consulta = Tela::where([
            ['cve_tela',$request->clave],
            ['unidad', $request->unidad],
            ['tipo_tela',$request->tipo_id]
        ])->get();
        if($consulta->isEmpty()){
            $tela = new Tela();
            $tela->cve_tela = $request->clave;
            $tela->descripcion = $request->descripcion;
            $tela->unidad = $request->unidad;
            $tela->tipo_tela = $request->tipo_id;
            $tela->save();
            return redirect()->route('telas-index');    
        }else{
            return redirect()->route('telas-index')->with('fail', 'No se pudo crear la TELA, ya que existe una tela con las mismas caracteristicas.');    
        }
        
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
        $tela = Tela::find($id);
        if ($tela->entradas->count() > 0  || $tela->salidas->count() > 0  || $tela->reingresos->count() > 0  || $tela->devoluciones->count() > 0 ) {
            return redirect()->route('telas-index')->with('fail','No se pudo borrar la Tela debido a que tiene algun registro de Entrada, Salida, Devolucion o Reingreso');
        }else{
            $tela->delete();

            return redirect()->route('telas-index')->with('status','Tela borrada exitosamente');
        }
    }

    public function indexTelas(){
        $telas = Tela::all();
        return view('telas.index', compact('telas'));
    }
}
