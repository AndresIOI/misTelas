@extends('layouts.index')
@section('titulo','Telas')
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
            Telas</div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($usuarios as $key => $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->username}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->rol->rol}}</td>
                        <td>
                          <form action="{{route('Telas.destroy',$usuario->id)}}" method="post">
                          <a href="{{route('Telas.edit',$usuario->id)}}" class="btn btn-primary"> Editar </a>
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