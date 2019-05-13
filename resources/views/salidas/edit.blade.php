@extends('layouts.index')
@section('titulo','Detalle Salida')
@section('content')
<form action="{{route('Salida-Tela.update',$salida->id)}}" method="post">
  @csrf
  @method('PUT')
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
     Detalles de Salida</div>
    <div class="card-body">
        <p><span style="font-weight:bold">Número de Requisicion: </span><input type="text" name="num_req" class="form-control" value="{{$salida->numeroRequisicion}}"></p>
        <p><span style="font-weight:bold">Piezas a realizar: </span><input type="text" class="form-control" name="piezas" value="{{$salida->piezas}}"></p>
        <p><span style="font-weight:bold">Fecha de salida: </span>{{$salida->created_at}}</p>
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
          @foreach($salida->telas as $tela)
            <tr>
              <td>{{$tela->tipo->tipo_tela}}</td>
              <td>{{$tela->cve_tela}}</td>
              <td>{{$tela->pivot->color}}</td>
              <td>{{$tela->pivot->cantidadSalida}}</td>
              <td>{{$tela->pivot->precioUnitario}}</td>
              <td>{{$tela->pivot->importeTotal}}</td>
            </tr>
          @endforeach  
          </tbody>
        </table>
      </div>
      <button class="btn btn-success" type="submit">Actualizar</button>
    </div>
</div>

</form>
@endsection