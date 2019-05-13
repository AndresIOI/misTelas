@extends('layouts.index')
@section('titulo','Inventario Habilitaciones')
@section('content')
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
@if(session('fail'))
    <div class="alert alert-danger">
        {{session('fail')}}
    </div>
@endif
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Productos Terminados</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th scope="col">SKU</th>
                    <th scope="col">Clasificacion</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($productos as $key => $producto)
                    <tr>
                        <td>{{$producto->SKU}}</td>
                        <td>{{$producto->clasificacion->clasificacion_producto}}</td>
                        <td>{{$producto->tipo->tipo_producto}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td><img src="img/{{$producto->img}}"  alt="..."  style="weight:50px; height: 50px;"></td>
                        <td>
                            <form action="{{route('ProductosTerminados.destroy',$producto->id)}}" method="post">
                            <a href="" class="btn btn-primary"> Editar </a>
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger">Borrar</button>
                            </form>
                          </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
</div>

@endsection