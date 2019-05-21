@extends('layouts.index')
@section('titulo','Devolución de Tela')
@section('content')
@include('common.errors')
	<form class="form-group" method="POST" action="{{route('Devolucion-Tela.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Datos de Devolución</div>
            <div class="card-body">
            <div class="row">
                <div class="col-6">
                <label for="">Orden de Compra</label>
                    <select name="orden_compra" id="ordenCompra" class="form-control" onchange="limpiar_devolucion_tela();">
                        <option value="" selected>Selecciones la entrada</option>
                        @foreach ($entradas as $entrada)
                            <option value="{{$entrada->num_entrada}}">{{$entrada->num_entrada}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
					<label for="">Proveedor</label>
					<input type="rage" name="proveedor"  class="form-control" id="proveedor" readonly>
                </div>
            </div>
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
            <select name="" class="form-control" id="telaTipoDevolucion" onchange="limpiatTipo();">
                                <option value="" selected>Seleccione Tipo de Tela</option>  
                            </select>
            </div>
            <div class="col-sm-4">
            <label for="">Clave de Tela</label>
            <select name="" id="cveTelaDevolucion" class="telas form-control">  
                                <option value="" selected>Seleccione Clave de de Tela</option> 
                            </select>
            </div>
            <div class="col-sm-4">
            <label for="">Color</label>
            <select name="" id="colorTelaDevolucion" class="form-control">
                                <option value="" selected>Elige el color</option>
                            </select>              
            </div>      
            <div class="col-sm-10">
            <label for="">Descripción</label>
            <input type="text" name="" class=" telaDescripcion form-control" id="telaDesDevolucion" disabled>
            </div>  
            <div class="col-sm-2">
            <label for="">Unidades</label>
            <input type="text" class=" telaUnidades form-control" id="telaUniDevolucion" disabled>
            </div>
            <div class="col-sm-6">
            <label for="">Cantidad en Almacén</label>
            <input type="number" name="" id="cantidadDisponibleDevolucion" class="form-control" readonly>
            </div>
            <div class="col-sm-6">
            <label for="">Cantidad de Devolución</label>
            <input type="number" name="" id="cantidadDevolucion" class="form-control" min="1" >
            </div>
            <div class="col">
            <br>
            <input type="button" onClick="agregar_tela(); limpiar_devolucion_tela();" value="Añadir Producto" class="btn btn-primary">
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
            <table class="table table-bordered table-striped thead-dark" id="tablaTelasDevoluciones" style="width:auto;">
                    
                    <tr>
                        <th scope="col">Tipo de tela</th>
                        <th scope="col">Clave Tela</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Color</th>
                        <th scope="col">Cantidad en Almacén</th>
                        <th scope="col">Cantidad de la devolución</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    
                    <tbody>

                    </tbody>
                    
                </table>
                </div>
            </div>
            </div>

        
            <button type="submit" class="btn btn-primary form-control" >Generar Devolucion</button>
        </form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src={{asset("js/OrdenCompra.js")}}></script>
    <script src={{asset("js/devoluciones_tipoTela.js")}}></script>
    <script src={{asset("js/propiedadesTelas.js")}}></script>
    <script src={{asset("js/colorDevolucion.js")}}></script>
    <script src={{asset("js/cantidadDisponibleDevolucion.js")}}></script>
    <script src={{asset("js/agregar_tela_devolucion.js")}}></script>
    <script src={{asset("js/limpiar_devolucion_tela.js")}}></script>
@endsection