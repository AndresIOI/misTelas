@extends('layouts.index')
@section('titulo','Detalle Reingreso Habilitación')
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles de Reingreso</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Número de Reingreso: </span>{{$reingreso->id}}</p>
                <p><span style="font-weight:bold">Número de Requisición: </span>{{$reingreso->numero_requisicion}}</p>
                <p><span style="font-weight:bold">Fecha de Reingreso: </span>{{$reingreso->created_at}}</p>   
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Clasificacion de Habilitación</th>
                      <th>Tipo de Habilitación</th>
                      <th>Clave de Habilitación</th>
                      <th>Cantidad de Reingreso</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($reingreso->habilitacions as $habilitacion)
                    <tr>
                      <td>{{$habilitacion->tipoHabilitacion->clasificacion->clasificacion}}</td>
                      <td>{{$habilitacion->tipoHabilitacion->tipos_habilitaciones}}</td>
                      <td>{{$habilitacion->clave}}</td>
                      <td>{{$habilitacion->pivot->cantidad}}</td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
</div>
@endsection