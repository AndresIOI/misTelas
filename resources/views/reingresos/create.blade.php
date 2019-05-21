@extends('layouts.index')
@section('titulo','Reingreso Tela')
@section('content')
@include('common.errors')
	<form class="form-group" method="POST" action="{{route('Reingreso-Tela.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Datos de Reingreso</div>
            <div class="card-body">
            <label for="">Número de Requisión</label>
                    <select name="num_requisicion" id="numeroRequisicion" class="form-control" onchange="limpiar_reingreso_tela();">
                        <option value=""selected>Seleccione el numero de Requisicion</option>
                        @foreach ($salidas as $salida)
                            <option value="{{$salida->numeroRequisicion}}">{{$salida->numeroRequisicion}}</option>
                        @endforeach
                    </select>

            </div>
            </div>
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Selección de Telas</div>
            <div class="card-body">
            <div class="row">
            <div class="col-sm-4">
            <label for="">Tipo de Tela</label>
            <select name="" class="form-control" id="telaTipoReingreso" onchange="limpiarTipo();">
                                <option value="" selected>Seleccione Tipo de Tela</option>  
                            </select>
            </div>
            <div class="col-sm-4">
            <label for="">Clave de Tela</label>
            <select name="" id="cveTelaReingreso" class="telas form-control">  
                                <option value="" selected>Seleccione Clave de Tela</option> 
                            </select>
            </div>
            <div class="col-sm-4">
            <label for="">Color</label>
            <select name="" id="colorTelaReingreso" class="form-control">
                                <option value="" selected>Elige el color</option>
                            </select>         
            </div>      
            <div class="col-sm-10">
            <label for="">Descripción</label>
            <input type="text" name="" class=" telaDescripcion form-control" id="telaDesReingreso" disabled>
            </div>  
            <div class="col-sm-2">
            <label for="">Unidades</label>
            <input type="text" class=" telaUnidades form-control" id="telaUniReingreso" disabled>
            </div>
            <div class="col-sm-6">
            <label for="">Cantidad de Salida</label>
            <input type="number" name="" id="cantidadSalida" class="form-control" readonly>
            </div>
            <div class="col-sm-6">
            <label for="">Cantidad de Reingreso</label>
            <input type="number" name="" id="cantidadReingreso" class="form-control" min="1" >
            </div>
            <div class="col">
            <br>
            <input type="button" onClick="agregar_tela(); limpiar_reingreso_tela(); " value="Añadir Producto" class="btn btn-primary">
            </div>
                <br>
                
                <br>
            </div>
            </div>
            </div>
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Telas Seleccionadas</div>
            <div class="card-body">
            <div  style ="overflow:scroll;">
            <table class="table table-bordered table-striped thead-dark" id="tablaTelasSalida" style="width:auto;">
                    
                    <tr>
                        <th scope="col">Tipo de tela</th>
                        <th scope="col">Clave Tela</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Color</th>
                        <th scope="col">Cantidad de Salida</th>
                        <th scope="col">Cantidad de Reingreso</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    
                    <tbody>

                    </tbody>
                    
                </table>
                </div>
            </div>
            </div>
            
            <button type="submit" class="btn btn-primary form-control" >Generar Reingreso</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src={{asset("js/numRequ_tipoTela.js")}}></script>
    <script src={{asset("js/reingresos_cveTela.js")}}></script>
    <script src={{asset("js/propiedadesTelas.js")}}></script>
    <script src={{asset("js/colorResingreso.js")}}></script>
    <script src={{asset("js/cantidadSalida.js")}}></script>
    <script src={{asset("js/limpiar_reingreso_tela.js")}}></script>
    <script src={{asset("js/agregar_tela_reingreso.js")}}></script>



      
@endsection