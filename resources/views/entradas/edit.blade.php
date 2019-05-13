@extends('layouts.index')
@section('titulo','Detalle Entrada Tela')
@section('content')
<form action="{{route('Entrada-Tela.update',$entrada->id)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                 Detalles de Entrada</div>
                <div class="card-body">
                    <p><span style="font-weight:bold">Clave de Entrada: </span><input type="text" value="{{$entrada->num_entrada}}" name="clave_entrada" class="form-control"></p>
                    <p><span style="font-weight:bold">Clave de Factura: </span><input type="text" value="{{$entrada->cve_factura}}" class="form-control" name="clave_factura"></p>  
                    <p><span style="font-weight:bold">Proveedor: </span>
                        <select name="proveedor_id" id="" class="form-control">
                            <option value="{{$entrada->id_proveedor}}" selected>{{$entrada->proveedor->nombreProveedor}}</option>
                            @foreach ($proveedores as $proveedor)
                                @if ($proveedor->nombreProveedor != $entrada->proveedor->nombreProveedor)
                                    <option value="{{$proveedor->id}}">{{$proveedor->nombreProveedor}}</option>
                                @endif
                            @endforeach
                        </select></p>  
                    <p><span style="font-weight:bold">Usuario de Compras: </span>
                        <select name="usuarioC_id" id="" class="form-control">
                            <option value="{{$entrada->id_usuarioC}}" selected>{{$entrada->usuario_c->nombre_usuarioC}}</option>
                            @foreach ($usuariosC as $usuario)
                            @if ($usuario->nombre_usuarioC != $entrada->usuario_c->nombre_usuarioC)
                                <option value="{{$usuario->id_usuario}}">{{$usuario->nombre_usuarioC}}</option>
                            @endif
                            @endforeach
                        </select>
                    </p>  
                    <p><span style="font-weight:bold">operario que recibio: </span><input type="text" value="{{$entrada->OperarioRecepcion}}" class="form-control" name="operario_r"></p>  

                    <p><span style="font-weight:bold">Fecha de Entrada: </span><input type="text" class="form-control" name="fecha" value="{{$entrada->created_at}}"></p>  
                    <br>
                    <input type="text" disabled value="TELAS" class="form-control">
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
                      @foreach($telas as $tela)
                        <tr>
                          <td>{{$tela->tipo->tipo_tela}}</td>
                          <td>{{$tela->cve_tela}}</td>
                          <td>{{$tela->pivot->color}}</td>
                          <td>{{$tela->pivot->nRollos}}</td>
                          <td>{{$tela->pivot->anchoRollo}}</td>
                          <td>{{$tela->pivot->precioUnitario}}</td>
                          <td>{{$tela->pivot->cantidad}}</td>
                          <td>{{$tela->pivot->importe}}</td>
                        </tr>
                      @endforeach  
                      </tbody>
                    </table>
                  </div>
                </div>
                <button type="submit" class="btn btn-success">Actualizar datos</button>

    </div>
</form>
@endsection