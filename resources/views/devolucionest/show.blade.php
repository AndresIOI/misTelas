@extends('layouts.index')
@section('titulo','Detalle Devolución')
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles de Devolución</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Número de Devolución: </span>{{$devolucion_productos->id}}</p>
                <p><span style="font-weight:bold">Clave de Factura: </span>{{$devolucion_productos->entrada->numero_entrada}}</p>   
                <p><span style="font-weight:bold">Fecha de Devolución: </span>{{$devolucion_productos->created_at}}</p>
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SKU</th>
                      <th>Clasificacion</th>
                      <th>Tipo</th>
                      <th>Descripcion</th>
                      <th>Talla</th>
                      <th>Cantidad de devolucion</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($devolucion_productos->products as $key =>$producto)
                    <tr>
                      <td>{{$producto->SKU}}</td>
                      <td>{{$producto->clasificacion->clasificacion_producto}}</td>
                      <td>{{$producto->tipo->tipo_producto}}</td>
                      <td>{{$producto->descripcion}}</td>
                      <td>{{$tallas[$key]}}</td>
                      <td>{{$producto->pivot->cantidad_devolucion}}</td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
</div>
@endsection