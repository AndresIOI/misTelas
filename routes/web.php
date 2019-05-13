<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');;

Route::get('/principal', function(){
    return view('layouts.principal');
})->name('principal');

//Routes Administracion
Route::Resource('Entrada-Tela','EntradasController');
Route::Resource('Telas','TelasController');
Route::Resource('Habilitaciones','HabilitacionsController');
Route::Resource('ProductosTerminados','ProductoTerminadoController');
Route::Resource('UsuariosCompras','UsuariosComprasController');
Route::Resource('Salida-Tela','SalidasController');
Route::Resource('Reingreso-Tela','ReingresosController');
Route::Resource('Devolucion-Tela','DevolucionesController');
Route::Resource('Principal','PrincipalController');
Route::Resource('Usuarios','UserController');
Route::Resource('Layout','Layouts');
Route::Resource('Entrada-Habilitacion','EntradasHabilitacionController');
Route::Resource('Salida-Habilitacion','SalidasHabilitacionController');
Route::Resource('Reingreso-Habilitacion','ReingresoHabilitacionController');
Route::Resource('Devolucion-Habilitacion','DevolucionesHabilitacionController');
Route::Resource('Entrada-Terminados','EntradasTerminadosController');
Route::Resource('Salida-Terminados','SalidasTerminadosController');
Route::Resource('Reingreso-Terminados','ReingresosTerminadosController');
Route::Resource('Devolucion-Terminados','DevolucionesTerminadosController');


// Routes Shop
Route::get('/shop', 'ShopController@shop')->name('shop');

//Routes Cart
Route::get('cart/show','CartController@show')->name('cart-show');
Route::get('cart/add/{product}','CartController@add')->name('cart-add');
Route::get('cart/delete/{product}', 'CartController@delete')->name('cart-delete');
Route::get('cart/trash','CartController@trash')->name('cart-trash');
Route::get('cart/update/{product}/{quantity?}','CartController@update')->name('cart-update');
Route::get('order-detail', [
	'middleware' => 'auth',
	'as' => 'order-detail',
	'uses' => 'CartController@orderDetail'
]);

//Routes Bind
Route::bind('product', function($id){
	return App\Inventario_Productos_Terminados::where('id',$id)->first();
});


// Auth::routes();
// Authentication Routes...
Route::get('Inicio de Sesión', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('Inicio de Sesión', 'Auth\LoginController@login');
Route::post('Cerrar Sesión', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
if ($options['Registro'] ?? true) {
    Route::get('Registro', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('Registro', 'Auth\RegisterController@register');
}
//Otros
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productos_terminados', 'ProductoTerminadoController@indexProductos')->name('productos_terminados.index');
Route::get('/habilitacionesC','HabilitacionsController@indexHabilitaciones')->name('habilitaciones-index');
Route::get('/TelasC','TelasController@indexTelas')->name('telas-index');

//Routes PayPal
Route::get('/payment', 'PaymentController@postPayment')->name('payment');
Route::get('/payment/status', 'PaymentController@getPaymentStatus')->name('payment.status');

//Routes Usuarios
Route::get('/profile-user','UserController@profile')->name('user-profile');
Route::get('/order/{id}/details','OrderController@details')->name('details-order');
