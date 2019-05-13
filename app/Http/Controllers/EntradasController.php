<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Entrada;
use App\UsuarioCompras;
use App\Tela;
use App\Tipo_Tela;
use App\Colores;
use App\tela_color_cantidad;
use App\Proveedor;
use App\Http\Requests\StoreEntradaRequest;


class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $entradas = Entrada::all();
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6){
            return view('entradas.index',compact('entradas'));
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
          $t_tela = Tipo_Tela::all();
          $empleadosC = UsuarioCompras::all();
          $telas = Tela::all();
          $colores = Colores::all();          
          $provedores = Proveedor::all();

          if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 ){
            return view('entradas.create',compact('fecha','telas','t_tela','empleadosC','colores','provedores'));
        }else{
            return view('layouts.sinPermisos');
        }
        // return view('Entradas.create',compact('fecha','telas','t_tela','empleadosC','colores','provedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntradaRequest $request)
    {
        //
        $entrada = new Entrada();
        $entrada->num_entrada = $request->num_entrada;
        $entrada->cve_factura = $request->cve_factura;
        $entrada->fecha = $request->fecha;
        $entrada->id_usuarioC=$request->usuarioCompras;
        $entrada->operarioRecepcion = $request->OperarioRecepcion;
        $entrada->id_usuario=Auth::user()->id;
        $entrada->id_proveedor = $request->proveedor;
        $entrada->save();
        $sync_data = [];
        

        for ($i=0; $i < count($request->clave_tela); $i++) { 
            $idColor = Colores::where('color',$request->color[$i])->get(array('id_color'));
            foreach ($idColor as $id) {
                $id->id;
            }
            $cve = implode('',$request->clave_tela[$i]);
            $rollos = implode('',$request->Rollos[$i]);
            $precioU = implode('',$request->precioUTela[$i]);
            $importe = implode('',$request->importeTotal[$i]);
            $ancho = implode('',$request->anchoTela[$i]);
            $cantidad = implode('',$request->cantidadTela[$i]);
            $nombreColor = implode('',$request->color[$i]);
            $color = $id->id_color;
            $sync_data[$cve.""] = ['nRollos' => $rollos, 'precioUnitario' =>$precioU, 'importe' => $importe, 'anchoRollo' => $ancho,'color'=>$nombreColor,'cantidad'=>$cantidad];
            
            $consulta = tela_color_cantidad::where([
                ['color' , $color],
                ['tela_id' , $cve]
            ])->get();
            
            if($consulta->isEmpty()){
                $colorCantidad = new tela_color_cantidad();
                $colorCantidad->color = $color;
                $colorCantidad->tela_id = $cve;
                $colorCantidad->cantidad = $cantidad;
                $colorCantidad->save();
            }else{
                $consulta = tela_color_cantidad::where([
                    ['color' , $color],
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
                $nuevaCantidad = $cantidadConsultaMap + $cantidad;
                
                $actualizacionTela->cantidad = $nuevaCantidad;
                $actualizacionTela->save();
            }   
            $entrada->telas()->attach($cve,array('nRollos' => $rollos, 'precioUnitario' => $precioU, 'importe' => $importe, 'anchoRollo' => $ancho,'cantidad' => $cantidad,'color' => $nombreColor));
        }
        return redirect()->route('Entrada-Tela.show', [$entrada])->with('status', 'Entrada Creada Correctamente');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrada = Entrada::find($id);
        $datosTelas = [];
        // $user_comp = UsuarioCompras::find();
        $proveedor = Proveedor::where('id',$entrada->id_proveedor)->get(array('nombreProveedor'));
        foreach ($proveedor as $key => $value) {
            $nombreProveedor = $value->nombreProveedor;
        }
        $entrada->id_proveedor = $nombreProveedor;
        $usuarioCompras = UsuarioCompras::where('id_usuario',$entrada->id_usuarioC)->get(array('nombre_usuarioC'));
        foreach ($usuarioCompras as $key => $usuarioC) {
            $nombreUsuarioCompras = $usuarioC->nombre_usuarioC;
        }
        $entrada->id_usuarioC = $nombreUsuarioCompras;

        $telas = DB::table('entradas')
            ->join('entrada_tela','entradas.id','=','entrada_tela.entrada_id')
            ->where('entradas.id',$entrada->id)
            ->select('entrada_tela.*')
            ->get();

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
            $datosTelas[$key] = ['tipo_tela' => $nombreTipoTela,'tela_id' => $cve,'nRollos'=>$tela->nRollos,'precioUnitario'=>$tela->precioUnitario,'importe'=>$tela->importe,'anchoRollo' => $tela->anchoRollo, 'color'=>$tela->color,'cantidad'=>$tela->cantidad];
        }
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 6){
            return view('entradas.show', compact('entrada','datosTelas'));
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
        $entrada = Entrada::find($id);
        $usuariosC = UsuarioCompras::all();
        $proveedores = Proveedor::all();
        $telas = $entrada->telas;
        return view('entradas.edit',compact('entrada','proveedores','usuariosC','telas'));
;    }

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
        $entrada = Entrada::find($id);
        $entrada->num_entrada = $request->clave_entrada;
        $entrada->cve_factura = $request->clave_factura;
        $entrada->fecha = $request->fecha;
        $entrada->id_usuarioC=$request->usuarioC_id;
        $entrada->operarioRecepcion = $request->operario_r;
        $entrada->id_usuario=Auth::user()->id;
        $entrada->id_proveedor = $request->proveedor_id;
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
