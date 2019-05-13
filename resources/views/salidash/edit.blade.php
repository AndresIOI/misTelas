@extends('layouts.index')
@section('titulo','Detalle Salida')
@section('content')
<form action="{{route('Salida-Habilitacion.update',$salida->id)}}" method="post">
    @csrf
    @method('PUT')

    <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
         Detalles de Salida</div>
        <div class="card-body">
            <p><span style="font-weight:bold">Numero de Requisición: </span><input type="text" name="num_req" id="" value="{{$salida->numero_requisicion}}" class="form-control"></p>
            <p><span style="font-weight:bold">Piezas a realizar: </span><input type="text" name="piezas" value="{{$salida->piezas}}" class="form-control"></p>
            <p><span style="font-weight:bold">Fecha de Salida: </span>{{$salida->created_at}}</p>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Clasificacion de Habilitación</th>
                  <th>Tipo de Habilitación</th>
                  <th>Clave de Habilitación</th>
                  <th>Cantidad de Salida</th>
                  <th>Precio Unitario</th>  
                  <th>Precio Total</th>
                </tr>
              </thead>
              <tbody>
              @foreach($salida->habilitacions as $habilitacion)
                <tr>
                  <td>{{$habilitacion->tipoHabilitacion->clasificacion->clasificacion}}</td>
                  <td>{{$habilitacion->tipoHabilitacion->tipos_habilitaciones}}</td>
                  <td>{{$habilitacion->clave}}</td>
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