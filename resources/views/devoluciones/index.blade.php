@extends('layouts.index')
@section('titulo','Historial Devolución Tela')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Devoluciones Tela
  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Número de Entrada</th>
            <th scope="col">Clave Factura</th>
              <th scope="col">Número Devolución</th>
          </tr>
        </thead>
        <tbody>
            @foreach($dovoluciones as $datos)
            <tr>
              <td><a href="{{route('Devolucion-Tela.show',[$datos->id_devolucion])}}">{{$datos->ordenCompra}}</td>
                <td>{{$datos->id_usuario}}</td>
              <td>{{$datos->id_devolucion}}</td>

            </tr>
          @endforeach 
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
