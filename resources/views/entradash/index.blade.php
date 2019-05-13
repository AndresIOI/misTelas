@extends('layouts.index')
@section('titulo','Historial Entrada Habilitación')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Entrada Habilitación
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Orden de Compra</th>
            <th scope="col">Clave Factura</th>
            <th scope="col">Fecha</th>
            <th scope="col">Persona que recibió</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($entradas_habilitacion as $entrada)
            <tr>
              <td><a href="/Entrada-Habilitacion/{{$entrada->id}}">{{$entrada->ordenCompra}}</a></td>
              <td>{{$entrada->claveFactura}}</td>
              <td>{{$entrada->fecha}}</td>
              <td>{{$entrada->OperarioRecepcion}}</td>
              <td>
                <a href="{{route('Entrada-Habilitacion.edit',$entrada->id)}}" class="btn btn-primary"> Editar </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection