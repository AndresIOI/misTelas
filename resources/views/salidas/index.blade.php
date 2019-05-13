@extends('layouts.index')
@section('titulo','Historial Salida Tela')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Salida Tela
  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Orden de Requisición</th>
             <th scope="col">Fecha</th>
             <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($salidas as $salida)
    <tr>
      <th><a href="/Salida-Tela/{{$salida->numeroRequisicion}}">{{$salida->numeroRequisicion}}<a></th>
      <td>{{$salida->created_at}}</td>
      <td>
        <a href="{{route('Salida-Tela.edit',$salida->id)}}" class="btn btn-primary"> Editar </a>
      </td>
    </tr>
  @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
