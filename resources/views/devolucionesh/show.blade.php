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
                <p><span style="font-weight:bold">Número de Devolución: </span>{{$devolucion->id}}</p>
                <p><span style="font-weight:bold">Orden de Compra: </span>{{$devolucion->entrada->ordenCompra}}</p>
                <p><span style="font-weight:bold">Clave de Factura: </span>{{$devolucion->entrada->claveFactura}}</p>   
                <p><span style="font-weight:bold">Proveedor: </span>{{$devolucion->entrada->proveedor->nombre_proveedorH}}</p> 
                <p><span style="font-weight:bold">Fecha de Devolución: </span>{{$devolucion->created_at}}</p>
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Clasificacion de Habilitación</th>
                      <th>Tipo de Habilitación</th>
                      <th>Clave de Habilitación</th>
                      <th>Cantidad de Devolución</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($devolucion->habilitacions as $habilitacion)
                    <tr>
                      <td>{{$habilitacion->tipoHabilitacion->clasificacion->clasificacion}}</td>
                      <td>{{$habilitacion->tipoHabilitacion->tipos_habilitaciones}}</td>
                      <td>{{$habilitacion->clave}}</td>
                      <td>{{$habilitacion->pivot->cantidad}}</td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
</div>
@endsection