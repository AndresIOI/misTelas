@extends('layouts.index')
@section('titulo','Detalle Entrada Tela')
@section('content')
@if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles de Entrada</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Clave de Entrada: </span>{{$entrada->num_entrada}}</p>
                <p><span style="font-weight:bold">Clave de Factura: </span>{{$entrada->cve_factura}}</p>  
                <p><span style="font-weight:bold">Proveedor: </span>{{$entrada->id_proveedor}}</p>  
                <p><span style="font-weight:bold">Usuario de Compras: </span>{{$entrada->id_usuarioC}}</p> 
                <p><span style="font-weight:bold">Operario que recibio: </span>{{$entrada->OperarioRecepcion}}</p>   
                <p><span style="font-weight:bold">Fecha de Entrada: </span>{{$entrada->created_at}}</p>  
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tipo de Tela</th>
                      <th>Clave de Tela</th>
                      <th>Color</th>
                      <th>Número de Rollos</th>
                      <th>Ancho del Rollo</th>
                      <th>Precio Unitario</th>
                      <th>Cantidad</th>
                      <th>Importe Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($datosTelas as $tela)
                    <tr>
                      <td>{{$tela['tipo_tela']}}</td>
                      <td>{{$tela['tela_id']}}</td>
                      <td>{{$tela['color']}}</td>
                      <td>{{$tela['nRollos']}}</td>
                      <td>{{$tela['anchoRollo']}}</td>
                      <td>{{$tela['precioUnitario']}}</td>
                      <td>{{$tela['cantidad']}}</td>
                      <td>{{$tela['importe']}}</td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
            </div>
</div>
@endsection