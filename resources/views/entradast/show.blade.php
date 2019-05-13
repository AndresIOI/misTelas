@extends('layouts.index')
@section('titulo','Detalle Entrada Productos Terminados')
@section('content')
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles Entrada Productos Terminados</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Numero de Entrada: </span>{{$entrada->id}}</p>
                <p><span style="font-weight:bold">Clave de Factura: </span>{{$entrada->numero_entrada}}</p>  
                <p><span style="font-weight:bold">Quien recibio: </span>{{$entrada->usuarioT->nombre_usuarioT}}</p>  
                <p><span style="font-weight:bold">Numero de Piezas Totales: </span>{{$entrada->numero_piezas}}</p>  
                <p><span style="font-weight:bold">Tipo de Produccion: </span>{{$entrada->tipo_produccion->Tipo_produccion}}</p>
                <p><span style="font-weight:bold">Maquilero: </span>{{$entrada->maquilero->nombre_maquilero}}</p>
                <p><span style="font-weight:bold">Fecha: </span>{{$entrada->created_at}}</p>  
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
                      <th>Cantidad</th>
                      <th>Precio Unitario</th>
                      <th>Importe Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($entrada->productos as $key => $producto)
                    <tr>
                      <td>{{$producto->SKU}}</td>
                      <td>{{$producto->clasificacion->clasificacion_producto}}</td>
                      <td>{{$producto->tipo->tipo_producto}}</td>
                      <td>{{$producto->descripcion}}</td>
                      <td>{{$tallas[$key]}}</td>
                      <td>{{$producto->pivot->cantidad_unidades}}</td>
                      <td>{{$producto->pivot->costo_unitario}}</td>
                      <td>{{$producto->pivot->costo_total}}</td>
                    </tr>
                  @endforeach   
                  </tbody>
                </table>
              </div>
            </div>
</div>
@endsection