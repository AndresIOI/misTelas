@extends('layouts.index')
@section('titulo','Historial Salidas')

@section('content')
@if (session('errorContador'))
    <div class="alert alert-danger">
        {{ session('errorContador') }}
    </div>
@endif
<div class="card mb-3">
  <div class="card-header">
    Historial de Salidas de Habilitaciones
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Número de Requisición</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de Salida</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($salidas_habilitacion as $salida)
            <tr>
              <td><a href={{route('Salida-Habilitacion.show', $salida->id)}}>{{$salida->numero_requisicion}}</td>
              <td>{{$salida->created_at}}</td>
              <td>{{$salida->id}}</a></td>
              <td>
                <a href="{{route('Salida-Habilitacion.edit',$salida->id)}}" class="btn btn-primary"> Editar </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection