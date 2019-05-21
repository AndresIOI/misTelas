@extends('layouts.index')
@section('titulo','Historial Reingreso Habilitación')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    Historial Reingresos Habilitación
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Número de Requisición</th>
            <th scope="col">Fecha</th>
            <th scope="col">Número de Reingreso</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reingresos_habilitacion as $reingreso)
            <tr>
              <td><a href={{route('Reingreso-Habilitacion.show', $reingreso->id)}}>{{$reingreso->numero_requisicion}}</td>
              <td>{{$reingreso->created_at}}</td>
              <td>{{$reingreso->id}}</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection