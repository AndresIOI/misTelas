@extends('layouts.index')
@section('titulo','Historial Devolución Habilitaciones')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Reingreso Habilitación
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Orden de Compra</th>
            <th scope="col">Clave Factura</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de Devolución</th>
          </tr>
        </thead>
        <tbody>
          @foreach($devoluciones_habilitacion as $devolucion)
            <tr>
                <td><a href={{route('Devolucion-Habilitacion.show', $devolucion->id)}}>{{$devolucion->entrada->ordenCompra}}</td>
                <td>{{$devolucion->entrada->claveFactura}}</td>
                <td>{{$devolucion->created_at}}</td>
              <td>{{$devolucion->id}}</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection