@extends('layouts.index')
@section('titulo','Detalle Entrada Habilitación')
@section('content')
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles de Entrada de Habilitaciones</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Clave de Entrada: </span>{{$entrada_habilitacion->ordenCompra}}</p>
                <p><span style="font-weight:bold">Clave de Factura: </span>{{$entrada_habilitacion->claveFactura}}</p>  
                <p><span style="font-weight:bold">Proveedor: </span>{{$entrada_habilitacion->proveedor->nombre_proveedorH}}</p>  
                <p><span style="font-weight:bold">Usuario de Compras: </span>{{$entrada_habilitacion->usuario_compras->nombre_usuarioCH}}</p>  
                <p><span style="font-weight:bold">Fecha de Entrada: </span>{{$entrada_habilitacion->created_at}}</p>  
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Clasificacion de Habilitación</th>
                      <th>Tipo de Habilitación</th>
                      <th>Clave de Habilitación</th>
                      <th>Empaque</th>
                      <th>Cantidad</th>
                      <th>Precio Unitario</th>
                      <th>Importe Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($entrada_habilitacion->habilitacions as $key => $habilitacion)
                    <tr>
                      <td>{{$habilitacion->tipoHabilitacion->clasificacion->clasificacion}}</td>
                      <td>{{$habilitacion->tipoHabilitacion->tipos_habilitaciones}}</td>
                      <td>{{$habilitacion->clave}}</td>
                      <td>{{$empaques[$key]}}</td>
                      <td>{{$habilitacion->pivot->cantidad}}</td>
                      <td>{{$habilitacion->pivot->precio_unitario}}</td>
                      <td>{{$habilitacion->pivot->precio_total}}</td>
                    </tr>
                  @endforeach   
                  </tbody>
                </table>
              </div>
            </div>
</div>
@endsection