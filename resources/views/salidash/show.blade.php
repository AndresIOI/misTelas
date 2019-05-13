@extends('layouts.index')
@section('titulo','Detalle Salida')
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<input value="{{$salida_habilitacion->numero_requisicion}}" id="Requi" type="hidden"> 
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles de Salida</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Numero de Requisición: </span>{{$salida_habilitacion->numero_requisicion}}</p>
                <p><span style="font-weight:bold">Fecha de Salida: </span>{{$salida_habilitacion->created_at}}</p>
                <p><span style="font-weight:bold">Piezas a realizar: </span>{{$salida_habilitacion->piezas}}</p>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Clasificacion de Habilitación</th>
                      <th>Tipo de Habilitación</th>
                      <th>Clave de Habilitación</th>
                      <th>Cantidad de Salida</th>
                      <th>Precio Unitario</th>  
                      <th>Precio Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($salida_habilitacion->habilitacions as $habilitacion)
                    <tr>
                      <td>{{$habilitacion->tipoHabilitacion->clasificacion->clasificacion}}</td>
                      <td>{{$habilitacion->tipoHabilitacion->tipos_habilitaciones}}</td>
                      <td>{{$habilitacion->clave}}</td>
                      <td>{{$habilitacion->pivot->cantidad}}</td>
                      <td>{{$habilitacion->pivot->precio_unitario}}</td>
                      <td>{{$habilitacion->pivot->precio_total}}</td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src={{asset("js/reiniciarContadorHabilitacion.js")}}></script>
@endsection