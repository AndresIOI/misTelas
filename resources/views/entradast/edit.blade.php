@extends('layouts.index')
@section('titulo','Detalle Entrada Productos Terminados')
@section('content')
<form action="{{route('Entrada-Terminados.update', $entrada->id)}}" method="post">
    @csrf
    @method('PUT')
        <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                 Detalles Entrada Productos Terminados</div>
                <div class="card-body">
                    <p><span style="font-weight:bold">Clave de Factura: </span><input type="text" class="form-control" name="cve_factura" value="{{$entrada->numero_entrada}}"></p>  
                    <p><span style="font-weight:bold">Quien recibio: </span> <select name="usuarioT_id" id="" class="form-control">
                        <option value="{{$entrada->empleado_id}}" selected>{{$entrada->usuarioT->nombre_usuarioT}}</option>
                        @foreach ($usuariosT as $usuarioT)
                        @if ($usuarioT->nombre_usuarioT != $entrada->usuarioT->nombre_usuarioT)
                            <option value="{{$usuarioT->id}}">{{$usuarioT->nombre_usuarioT}}</option>
                        @endif
                        @endforeach    
                    </select></p>  
                    <p><span style="font-weight:bold">Numero de Piezas Totales: </span><input type="text" class="form-control" name="piezas" value="{{$entrada->numero_piezas}}"></p>  
                    <p><span style="font-weight:bold">Tipo de Produccion: </span><select name="tipo_id" id=""  class="form-control">
                        <option value="{{$entrada->tipo_produccion_id}}">{{$entrada->tipo_produccion->Tipo_produccion}}</option>    
                        @foreach ($produccion as $produc)
                        @if ($entrada->tipo_produccion->Tipo_produccion != $produc->Tipo_produccion)
                            <option value="{{$produc->id}}">{{$produc->Tipo_produccion}}</option>
                        @endif
                        @endforeach
                    </select></p>
                    <p><span style="font-weight:bold">Maquilero: </span><select name="maquilero_id" id="" class="form-control">
                        <option value="{{$entrada->maquilero_id}}" selected>{{$entrada->maquilero->nombre_maquilero}}</option>    
                        @foreach ($maquileros as $maquilero)
                        @if ($entrada->maquilero->nombre_maquilero != $maquilero->nombre_maquilero)
                            <option value="{{$maquilero->id}}">{{$maquilero->nombre_maquilero}}</option>
                        @endif
                        @endforeach
                    </select></p>
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
                  <button type="submit" class="btn btn-success">Actualizar</button>

                </div>
    </div>
</form>

@endsection