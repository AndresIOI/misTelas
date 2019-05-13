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
use App\UsuarioT;
use App\Maquileros;
use App\Tproduccion;
use App\Tipo_Producto;
use App\Clasificacion_Producto;
use App\Producto_Terminado;
use App\Entrada_Productos_Terminados;
use App\Talla_Producto;
use App\Inventario_Productos_Terminados;

class Layouts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptotal = Entrada::all();
        $ptotal = Entrada_Productos_Terminados::all();
        // return view('layouts.index');
        $usuario = Auth::user();
    return $usuario;
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
