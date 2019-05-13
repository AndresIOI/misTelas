@extends('layouts.index')
@section('titulo','Detalle Salida')
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<input value="{{$salida_productos->numero_requisicion}}" id="Requi" type="hidden"> 
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles de Salida</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Numero de Requisicion: </span>{{$salida_productos->numero_requisicion}}</p>
                <p><span style="font-weight:bold">Fecha de Salida: </span>{{$salida_productos->created_at}}</p>
                <p><span style="font-weight:bold">Quien ordeno la salida : </span>{{$salida_productos->usuario_orden->Nombre_userOrden}}</p>
                <p><span style="font-weight:bold">Tipo de salida: </span>{{$salida_productos->tipo_salida->Tipo_venta}}</p>
                <p id="contador"><span style="font-weight:bold" type="hidden">Contador de Salidas: </span>{{$salida_productos->contador}}</p>
                <p><span style="font-weight:bold" type="hidden">~ Importe total de salida: </span>{{$salida_productos->importe_total_salida}}</p>
                @if(Auth::user()->rol_id == 1)
                <p><button class="btn btn-success" id="boton">Reiniciar Contador</button></p> 
                @endif
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
                      <th>Cantidad de salida</th>
                      <th>Precio Unitario</th>
                      <th>Importe Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($salida_productos->products as $key => $producto)
                    <tr>
                      <td>{{$producto->SKU}}</td>
                      <td>{{$producto->clasificacion->clasificacion_producto}}</td>
                      <td>{{$producto->tipo->tipo_producto}}</td>
                      <td>{{$producto->descripcion}}</td>
                      <td>{{$tallas[$key]}}</td>
                      <td>{{$producto->pivot->cantidad}}</td>
                      <td>{{$producto->pivot->precio_unitario}}</td>
                      <td>{{$producto->pivot->precio_total}}</td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src={{asset("js/reiniciarContadorProducto.js")}}></script>
@endsection