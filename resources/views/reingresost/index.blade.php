@extends('layouts.index')
@section('titulo','Historial Reingresos Productos Terminados')

@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Reingresos Productos Terminados
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Número de Reingreso</th>
            <th scope="col">Numero de Requisicion</th>
            <th scope="col">Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reingresos as $reingreso)
            <tr>
              <th><a href={{route('Reingreso-Terminados.show', $reingreso->id)}}>{{$reingreso->id}}</a></th>
              <td>{{$reingreso->salida->numero_requisicion}}</td>
              <td>{{$reingreso->created_at}}</td>
              <td>
                <a href="" class="btn btn-primary"> Editar </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection