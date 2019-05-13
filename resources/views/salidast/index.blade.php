@extends('layouts.index')
@section('titulo','Historial Salida Productos Terminados')

@section('content')
@if (session('errorContador'))
    <div class="alert alert-danger">
        {{ session('errorContador') }}
    </div>
@endif
<div class="card mb-3">
  <div class="card-header">
    Historial Salida Productos Terminados
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            {{-- <th scope="col">Número de Salida</th> --}}
            <th scope="col">Numero de Requisicion</th>
            <th scope="col">Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($salidas_productos as $salida)
            <tr>
              {{-- <th><a href={{route('Salida-Terminados.show', $salida->id)}}>{{$salida->id}}</a></th> --}}
              <td><a href={{route('Salida-Terminados.show', $salida->id)}}>{{$salida->numero_requisicion}}</a></td>
              <td>{{$salida->created_at}}</td>
              <td>
                <a href="{{route('Salida-Terminados.edit',$salida->id)}}" class="btn btn-primary"> Editar </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection