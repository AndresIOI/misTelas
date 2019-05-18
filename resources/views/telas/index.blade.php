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
                    <th scope="col">Clave</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha de creacion</th>
                    <th scope="col">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($telas as $key => $tela)
                    <tr>
                        <td>{{$tela->cve_tela}}</td>
                        <td>{{$tela->descripcion}}</td>
                        <td>{{$tela->unidad}}</td>
                        <td>{{$tela->tipo->tipo_tela}}</td>
                        <td>{{$tela->created_at}}</td>
                        <td>
                          <form action="{{route('Telas.destroy',$tela->id)}}" method="post">
                          <a href="{{route('Telas.edit',$tela->id)}}" class="btn btn-primary"> Editar </a>
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