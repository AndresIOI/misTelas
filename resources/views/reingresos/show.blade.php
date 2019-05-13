@extends('layouts.index')
@section('titulo','Detalle Reingreso Tela')
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
                <p><span style="font-weight:bold">Número de Reingreso: </span>{{$datosReingreso['numeroReingreso']}}</p>
                <p><span style="font-weight:bold">Número de Requisición: </span>{{$datosReingreso['numeroRequisicion']}}</p>
                <p><span style="font-weight:bold">Fecha de Reingreso: </span>{{$datosReingreso['fecha']}}</p>   
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tipo de Tela</th>
                      <th>Clave de Tela</th>
                      <th>Color</th>
                      <th>Cantidad de Reingreso</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($datosTelas as $tela)
                    <tr>
                      <td>{{$tela['tipo_tela']}}</td>
                      <td>{{$tela['cve_tela']}}</td>
                      <td>{{$tela['color']}}</td>
                      <td>{{$tela['cantidad']}}</td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
</div>
@endsection