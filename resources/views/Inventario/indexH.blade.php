@extends('layouts.index')
@section('titulo','Inventario Habilitaciones')
@section('content')
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Inventario de Habilitaciones</div>
            <div class="card-body">
                <p><span style="font-weight:bold">~ Dinero en Inventario: </span>${{$precio_total_inventario}}</p> 
                {{--<p><span style="font-weight:bold">~ Dinero Invertido en Entradas: </span>$</p>--}}
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th scope="col">Clasificacion de Habilitación</th>
                    <th scope="col">Tipo de Habilitación</th>
                    <th scope="col">Clave de Habilitación</th>
                    <th scope="col">Precio Unitario de Habilitación</th>
                    <th scope="col">Cantidad en Inventario</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($inventario as $key => $dato)
                    <tr>
                    <td>{{$dato->habilitacion->tipoHabilitacion->clasificacion->clasificacion}}</td>
                    <td>{{$dato->habilitacion->tipoHabilitacion->tipos_habilitaciones}}</td>
                    <td>{{$dato->habilitacion->clave}}</td>
                    <td>{{$precios[$key]}}</td>
                    <td>{{$dato->cantidad_inventario}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
</div>

@endsection