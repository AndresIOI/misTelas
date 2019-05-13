@extends('layouts.index')
@section('titulo','Inventario Habilitaciones')
@section('content')
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Inventario de Productos Terminados</div>
            <div class="card-body">
                <p><span style="font-weight:bold">~ Dinero en Inventario: </span>${{$precio_total_inventario}}</p> 
                {{--<p><span style="font-weight:bold">~ Dinero Invertido en Entradas: </span>$</p>--}}
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th scope="col">SKU</th>
                    <th scope="col">Clasificacion</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Talla</th>
                    <th scope="col">~Precio unitario</th>
                    <th scope="col">Cantidad en Inventario</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($productos_inventario as $key => $producto)
                    <tr>
                    <td>{{$producto->producto->SKU}}</td>
                    <td>{{$producto->producto->clasificacion->clasificacion_producto}}</td>
                    <td>{{$producto->producto->tipo->tipo_producto}}</td>
                    <td>{{$tallas[$key]}}</td>
                    <td>{{$promedio_precios[$key]}}</td>
                    <td>{{$producto->cantidad_inventario}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
</div>

@endsection