@extends('layouts.index')
@section('titulo','Detalle Salida')
@section('content')
<form action="{{route('Salida-Terminados.update',$salida->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Detalles de Salida</div>
            <div class="card-body">
                <p><span style="font-weight:bold">Numero de Requisicion: </span><input type="text" class="form-control" value="{{$salida->numero_requisicion}}" name="num_req"></p>
                <p><span style="font-weight:bold">Quien ordeno la salida : </span><select name="usuarioO_id" id="" class="form-control">
                    <option value="{{$salida->usuarioSalida_id}}" selected>{{$salida->usuario_orden->Nombre_userOrden}}</option>   
                    @foreach ($usersO as $user)
                    @if ($user->Nombre_userOrden != $salida->usuario_orden->Nombre_userOrden)
                        <option value="{{$user->id}}">{{$user->Nombre_userOrden}}</option>
                    @endif
                    @endforeach 
                </select></p>
                <p><span style="font-weight:bold">Tipo de salida: </span><select name="tipo_id" id="" class="form-control">
                    <option value="{{$salida->tipoSalida_id}}" selected>{{$salida->tipo_salida->Tipo_venta}}</option>    
                    @foreach ($tipos as $tipo)
                    @if ($tipo->Tipo_venta != $salida->tipo_salida->Tipo_venta)
                        <option value="{{$tipo->id}}">{{$tipo->Tipo_venta}}</option>
                    @endif
                    @endforeach
                </select>{{$salida_productos->tipo_salida->Tipo_venta}}</p>
                <p><span style="font-weight:bold">Fecha de Salida: </span>{{$salida->created_at}}</p>

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
                  @foreach($salida->products as $key => $producto)
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
              <button type="submit" class="btn btn-success">Actualizar</button>

            </div>
</div>
</form>

@endsection