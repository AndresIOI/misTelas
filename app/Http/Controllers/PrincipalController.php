<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Entrada;
use App\Salida;
use App\Reingreso;
use Illuminate\Support\Facades\DB;
use App\UsuarioCompras;
use App\Tela;
use App\Proveedor;
use App\Tipo_Tela;
use App\Colores;
use App\tela_color_cantidad;
use App\Devolucion;
use Illuminate\Support\Collection;
use App\HabilitacionUsuariosOrden;
use App\HabilitacionProveedor;
use App\Clasificacion;
use App\TipoHabilitacion;
use App\Habilitacion;
use App\Empaque;
use App\Entrada_Habilitacion;   
use App\Inventario_Habilitaciones;
use App\Devolucion_Habilitacion;
use App\Salida_Habilitacion;
use App\Reingreso_Habilitacion;
use App\UsuarioT;
use App\Maquileros;
use App\Tproduccion;
use App\Tipo_Producto;
use App\Clasificacion_Producto;
use App\Producto_Terminado;
use App\Entrada_Productos_Terminados;
use App\Talla_Producto;
use App\Inventario_Productos_Terminados;
use App\Http\Requests\EntradaPTRequest;
use App\Tventa;
use App\UserOrdenT;
use App\SalidaProductoTerminado;
use App\Http\Requests\StoreSalidaTerminadosRequest;
use App\Reingreso_Productos;
use App\Http\Requests\StoreReingresoPTRequest;
use App\Devolucion_Productos;
use App\Http\Requests\DevolucionPTStore;
use App\Http\Requests\StoreDevolucionRequest;



class PrincipalController extends Controller
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

        $entradas = Entrada::all()->last();
        $salidas = Salida::all()->last();
        $reingresos = Reingreso::all()->last();
        $devoluciones = Devolucion::all()->last();
        $entradas_habilitacion = Entrada_Habilitacion::all()->last();
        $devoluciones_habilitacion = Devolucion_Habilitacion::all()->last();
        // $dovoluciones = Devolucion::all()->last();
        $salidas_habilitacion = Salida_Habilitacion::all()->last();
        $reingresos_habilitacion = Reingreso_Habilitacion::all()->last();
        $pt = Entrada_Productos_Terminados::all()->last();
        $spt = SalidaProductoTerminado::all()->last();
        $rpt = Reingreso_Productos::all()->last();
        $dpt = Devolucion_Productos::all()->last();
        
        
        $tipos_habilitaciones = TipoHabilitacion::all()->last();
        $clasificaciones = Clasificacion::all()->last();
        
        
        $dovoluciones = Devolucion::all()->last();
        
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
            }
            $datosDevolucion = ['id_devolucion' => $id, 'ordenCompra'=>$numeroEntrada,'proveedor'=>$nombreProveedor,'factura'=>$cveFactura,'fecha'=>$dato->created_at->toDateTimeString()];
        }
        $telas = DB::table('devolucion_tela')->where('id_devolucion',$id)->get();
 
        foreach ($telas as $key => $tela) {
            $ids_tipoTelas = Tela::where('id_t',$tela->cve_tela)->get(array('tipo_tela'));
            foreach ($ids_tipoTelas as$id_tT) {
                $idTipoTela = $id_tT->tipo_tela;
            }
            $tiposTelas = Tipo_Tela::where('id_tipo_tela',$idTipoTela)->get(array('tipo_tela'));
            foreach ($tiposTelas as  $nombre) {
                $nombreTipoTela = $nombre->tipo_tela;
            }
            $datosTelas[$key] = ['tipo_tela' => $nombreTipoTela,'cve_tela' => $tela->cve_tela,'color'=>$tela->color,'cantidad'=>$tela->cantidadDevolucion];
            
        }

        
        if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6  ){
            // return $pt;
       return view('layouts.principal', compact('entradas','salidas', 'reingresos','devoluciones','devolucion','datosDevolucion','datosTelas','entradas_habilitacion','devoluciones_habilitacion','dovoluciones','salidas_habilitacion','reingresos_habilitacion','clasificaciones','tipos_habilitaciones','pt','spt','rpt','dpt'));
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
