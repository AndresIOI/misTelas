@extends('layouts.index')
@section('titulo','Historial Entrada Productos Terminados')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Entrada Productos Terminados
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Clave Factura</th>
            <th scope="col">Persona que recibió</th>
            <th scope="col">Fecha</th>
            <th scope="col">Maquilero</th>
            <th> Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($entrada as $entradas)
            <tr>
              <td><a href="/Entrada-Terminados/{{$entradas->id}}">{{$entradas->numero_entrada}}</a></td>
              <td>{{$entradas->usuarioT->nombre_usuarioT}}</td>
              <td>{{$entradas->created_at}}</td> 
              <td>{{$entradas->maquilero->nombre_maquilero}}</td>
              <td>
                <a href="{{route('Entrada-Terminados.edit',$entradas->id)}}" class="btn btn-primary"> Editar </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection