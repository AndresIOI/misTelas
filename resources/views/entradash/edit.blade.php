@extends('layouts.index')
@section('titulo','Detalle Entrada Habilitación')
@section('content')
<form action="{{route('Entrada-Habilitacion.update',$entrada->id)}}" method="post">
  @csrf
  @method('PUT')
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
     Detalles de Entrada de Habilitaciones</div>
    <div class="card-body">
        <p><span style="font-weight:bold">Clave de Entrada: </span><input type="text" value="{{$entrada->ordenCompra}}" name="clave_entrada" class="form-control"></p>
        <p><span style="font-weight:bold">Clave de Factura: </span><input type="text" class="form-control" value="{{$entrada->claveFactura}}" name="clave_factura"></p>  
        <p><span style="font-weight:bold">Proveedor: </span><select name="proveedor_id" id="" class="form-control">
            <option value="{{$entrada->proveedor_id}}" selected>{{$entrada->proveedor->nombre_proveedorH}}</option>  
            @foreach ($proveedores as $proveedor)
            @if ($proveedor->nombre_proveedorH != $entrada->proveedor->nombre_proveedorH)
              <option value="{{$proveedor->id}}">{{$proveedor->nombre_proveedorH}}</option>
            @endif
            @endforeach  
        </select></p>  
        <p><span style="font-weight:bold">Usuario de Compras: </span><select name="usuarioC_id" id="" class="form-control">
            <option value="{{$entrada->operarioCompra}}" selected>{{$entrada->usuario_compras->nombre_usuarioCH}}</option> 
            @foreach ($usuariosC as $usuario)
            @if ($usuario->nombre_usuarioCH != $entrada->usuario_compras->nombre_usuarioCH)
              <option value="{{$usuario->id}}">{{$usuario->nombre_usuarioCH}}</option>
            @endif
            @endforeach   
        </select></p>  
        <p><span style="font-weight:bold">Operario que Recibio: </span><input type="text" class="form-control" value="{{$entrada->OperarioRecepcion}}" name="operario"></p>  
        <p><span style="font-weight:bold">Fecha de Entrada: </span>{{$entrada->created_at}}</p>  
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
          @foreach($entrada->habilitacions as $key => $habilitacion)
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
      <button type="submit" class="btn btn-success">Actualizar</button>

    </div>
</div>
</form>

@endsection