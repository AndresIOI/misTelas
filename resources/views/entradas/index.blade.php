@extends('layouts.index')
@section('titulo','Historial Entradas Tela')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial de Entradas de Tela
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
          @foreach($entradas as $entrada)
    <tr>
    <th><a href="/Entrada-Tela/{{$entrada->id}}">{{$entrada->num_entrada}}</a></th>
      <td>{{$entrada->cve_factura}}</td>
      <td>{{$entrada->fecha}}</td>
      <td>{{$entrada->OperarioRecepcion}}</td>
      <td>
        <a href="{{route('Entrada-Tela.edit',$entrada->id)}}" class="btn btn-primary"> Editar </a>
      </td>
    </tr>
  @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
