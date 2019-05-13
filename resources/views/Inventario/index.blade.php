@extends('layouts.index')
@section('titulo','Inventario Telas')

@section('content')
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Inventario de Telas</div>
            <div class="card-body">
                <p><span style="font-weight:bold">~Dinero en Inventario: </span>${{$dineroPromedioInventario}}</p>
                <br>
                <p><span style="font-weight:bold">~Dinero Total Invertido en Entradas: </span>${{$importeTotal}}</p>
                
                <br>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th scope="col">Tipo de Tela</th>
                    <th scope="col">Clave de Tela</th>
                    <th scope="col">Color</th>
                    <th scope="col">Precio Unitario de Tela</th>
                    <th scope="col">Cantidad en Inventario</th>
                    {{-- <th scope="col">Precio Total</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($inventario as $tela)
                    <tr>
                    <td>{{$tela['tipo_Tela']}}</td>
                    <td>{{$tela['cve_tela']}}</td>
                    <td>{{$tela['color']}}</td>
                    <td>{{$tela['promedioPrecioUnitario']}}</td>
                    <td>{{$tela['cantidad']}}</td>
                    {{-- <td>{{$tela['ptotal']}}</td> --}}
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
</div>

@endsection