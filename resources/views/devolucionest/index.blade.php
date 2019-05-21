@extends('layouts.index')
@section('titulo','Historial Devoluciones Productos Terminados')

@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Devoluciones Productos Terminados
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Número de Devolución</th>
            <th scope="col">Factura</th>
            <th scope="col">Fecha</th>
          </tr>
        </thead>
        <tbody>
          @foreach($devoluciones as $devolucion)
            <tr>
              <th><a href={{route('Devolucion-Terminados.show', $devolucion->id)}}>{{$devolucion->id}}</a></th>
              <td>{{$devolucion->entrada->numero_entrada}}</td>
              <td>{{$devolucion->created_at}}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection