@extends('layouts.index')
@section('titulo','Historial Reingreso Tela')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Reingresos Tela
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Número de Requisición</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de Reingreso</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($reingresos as $reingreso)
            <tr>
              <td><a href="{{route('Reingreso-Tela.show',[$reingreso->id_reingreso])}}">{{$reingreso->salida->numeroRequisicion}}</a></td>
              <td>{{$reingreso->created_at}}</td>
              <td>{{$reingreso->id_reingreso}}</td>
              <td>
                <a href="" class="btn btn-primary"> Editar </a>
              </td>
            </tr>
          @endforeach
            </tbody>
            </table>
        @endsection