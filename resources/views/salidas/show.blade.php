@extends('layouts.index')
@section('titulo','Detalle Salida')
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<input value="{{$datosSalida['numeroRequisicion']}}" id="Requi" type="hidden"> 
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles de Salida</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Número de Requisicion: </span>{{$datosSalida['numeroRequisicion']}}</p>
                <p><span style="font-weight:bold">Fecha de Salida: </span>{{$datosSalida['fechaSalida']}}</p>
                <p><span style="font-weight:bold">Piezas a realizar: </span>{{$datosSalida['piezas']}}</p>
                <p id="contador"><span style="font-weight:bold" type="hidden">Contador de Salidas: </span>{{$datosSalida['contador']}}</p>
                <p><span style="font-weight:bold" type="hidden">~ Importe total de salida: </span>{{$datosSalida['importeTotal']}}</p>
                @if(Auth::user()->rol_id == 1)
                <p><button class="btn btn-success" id="boton">Reiniciar Contador</button></p> 
                @endif
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tipo de Tela</th>
                      <th>Clave de Tela</th>
                      <th>Color</th>
                      <th>Cantidad de Salida</th>
                      <th>Precio Unitario</th>
                      <th>Precio Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($datosTelas as $tela)
                    <tr>
                      <td>{{$tela['tipo_tela']}}</td>
                      <td>{{$tela['cve_tela']}}</td>
                      <td>{{$tela['color']}}</td>
                      <td>{{$tela['cantidad']}}</td>
                      <td>{{$tela['precioUnitario']}}</td>
                      <td>{{$tela['importeTela']}}</td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src={{asset("js/reiniciarContador.js")}}></script>
@endsection