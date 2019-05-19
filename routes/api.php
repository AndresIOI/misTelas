<?php

use Illuminate\Http\Request;
use App\Tela;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tipoTelas/{id}/telas','TelasController@byTipoTela');
Route::get('/tipoTelaSalida/{id}/telas','TelasController@byTipoTelaSalida');
Route::get('/tela/{id}','TelasController@byTela');
Route::get('/tela/{id}/colores','TelasController@byTelaColores');
Route::get('/tela/{id}/{color}/cantida','TelasController@byTelaCantidad');
Route::get('/tipoTelas/Salida/{id}','TelasController@byTipoTelaReingreso');
Route::get('/tipoTelaReingreso/{id}/{numReq}/telas','TelasController@byCveTelasReingreso');
Route::get('/tela/{id}/{numReq}/coloresReingreso','TelasController@byTelaColoresReingreso');
Route::get('/tela/{id}/{color}/{numReq}/cantida','TelasController@byTelaCantidadSalida');
Route::get('/ordenCompra/{id}/datos','TelasController@byDatosordenCompra');
Route::get('/tipoTelaDevolucion/{id}/{ordenCompra}/telas','TelasController@byTipoTelaDevolucion');
Route::get('/tela/{cveTela}/{ordenCompra}/coloresDevolucion','TelasController@byColorDevolucion');
Route::get('/tela/{id}/{color}/cantidaDevolucion','TelasController@byCantidadDevolucion');
Route::get('/contador/{numeroRequisicion}','SalidasController@byChecarContadorSalida');
Route::get('/reiniciarContador/{numeroRequisicion}','SalidasController@byReiniciarContadorSalida');
Route::get('/tela/{id}/precioUnitario','TelasController@byTelaPrecioPromedio');
Route::get('/clasificacion/{id}/{ruta}/tipoHabilitacion','EntradasHabilitacionController@tipoHabilitacion');
Route::get('/tipoHabilitacion/{id}/{ruta}/habilitaciones','EntradasHabilitacionController@habilitaciones');
Route::get('/habilitacion/{id}/{ruta}','EntradasHabilitacionController@DetallesHabilitacion');
Route::get('/clasificacionHabilitacion/reingreso/{id}','ReingresoHabilitacionController@clasificacionHabilitacion');


Route::get('/clasificacion/{id}/{numero_requisicion}/tipoHabilitacion/reingreso','ReingresoHabilitacionController@tipoHabilitacion');
Route::get('/clasificacion/{id}/{numero_requisicion}/tipoHabilitacion/habilitacion/reingreso','ReingresoHabilitacionController@habilitacion');
Route::get('/habilitacion/{id}/{numero_requisicion}/detalles','ReingresoHabilitacionController@habilitacionDescripcion');


Route::get('/clasificacion/{id}/devolucion','DevolucionesHabilitacionController@clasificacion');
Route::get('/clasificacion/{id}/{orden_compra}/tipoHabilitacion/devolucion','DevolucionesHabilitacionController@tipo');
Route::get('/clasificacion/{id}/{orden_compra}/tipoHabilitacion/clave/devolucion','DevolucionesHabilitacionController@clave');
Route::get('/clasificacion/{id}/{orden_compra}/tipoHabilitacion/clave/detalle/devolucion','DevolucionesHabilitacionController@detalles');
Route::get('/productoTerminado/detalles/{id}','EntradasTerminadosController@detallesProducto');
Route::get('/productoTerminadoSalida/detalles/{id}','SalidasTerminadosController@detallesProducto');
Route::get('/talla/{talla_id}/producto/{producto_id}/detalles','SalidasTerminadosController@detallesTallas');
Route::get('/salida/{numeroRequisicion}/productos','ReingresosTerminadosController@bySalida');
Route::get('/salida/{numeroRequisicion}/producto/{producto_id}/detalles','ReingresosTerminadosController@byProductos');
Route::get('/salida/{numeroRequisicion}/producto/{producto_id}/{talla_id}/cantidad','ReingresosTerminadosController@byCantidad');
Route::get('/entradaProductos/{factura}/productos','DevolucionesTerminadosController@byProductosEntrada');
Route::get('/entradaProductos/{factura}/producto/{producto_id}/detalles','DevolucionesTerminadosController@byProductoDetalles');
Route::get('/entradaProductos/{factura}/producto/{producto_id}/talla/{talla_id}/cantidad','DevolucionesTerminadosController@byProductoCantidad');
Route::get('/contador/salidaHabilitacion/{numeroRequisicion}','SalidasHabilitacionController@byContador');
Route::get('/reiniciarContadorHabilitacion/{numeroRequisicion}','SalidasHabilitacionController@byReiniciarContadorSalida');
Route::get('/contador/salidaProducto/{numeroRequisicion}','SalidasTerminadosController@byContador');
Route::get('/reiniciarContadorProducto/{numeroRequisicion}','SalidasTerminadosController@byReiniciarContadorSalida');
Route::get('/clasificacion/{clasificacion_id}/tipos','ProductoTerminadoController@byTipos');

//shop 
Route::get('/producto/{id}/inventario/cantidad','ShopController@cantidad');