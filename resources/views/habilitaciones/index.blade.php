@extends('layouts.index')
@section('titulo','Habilitaciones')
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
            Habilitaciones</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha de creacion</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($habilitaciones as $key => $habilitacion)
                    <tr>
                        <td>{{$habilitacion->clave}}</td>
                        <td>{{$habilitacion->descripcion}}</td>
                        <td>{{$habilitacion->unidad}}</td>
                        <td>{{$habilitacion->tipoHabilitacion->tipos_habilitaciones}}</td>
                        <td>{{$habilitacion->created_at}}</td>
                        <td>
                            <form action="{{route('Habilitaciones.destroy',$habilitacion->id)}}" method="post">
                            <a href="{{route('Habilitaciones.edit',$habilitacion->id)}}" class="btn btn-primary"> Editar </a>
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