@extends('layouts.index')
@section('titulo','Reingreso Productos Terminados')
@section('content')
@include('common.errors')
	<form class="form-group" method="POST" action="{{route('Reingreso-Terminados.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Datos de Reingreso</div>
            <div class="card-body">
            <label for="">Orden de Requisición</label>
					<input type="string" name="num_requisicion"  id="numeroRequisicion" class="form-control numeroRequisicion">
            </div>
            </div>  
              <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-table"></i>
                     Selección de Productos Terminados</div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col-sm-4">
                                    <label for="">SKU/Modelo</label>
                                    <select name="skuReingresos" id="skuReingresos" class="form-control skuReingresos">
                                        <option value="" selected>Seleccione Producto</option>
                                    </select>   
                            </div>
                            <div class="col-sm-4">
                                    <label for="">Clasificación</label>
                                    <input type="text" id="clasificacionReingreso" name="clasificacionReingreso" class="form-control" readonly>
                                    </div>     
                    <div class="col-sm-4">
                    <label for="">Tipo de Producto</label>
                    <input type="text" id="tipoReingreso"  class="form-control" readonly>
                    </div>
                     
                    <div class="col-sm-9">
                    <label for="">Descripción</label>
                    <input type="text" id="descripcionReingreso"  class="form-control" readonly>
                    </div>  
                    <div class="col-sm-3">
                    <label for="">Talla</label>
                    <select class="form-control" id="tallaReingreso">
                        <option value="" selected>Seleccione la Talla</option>  
                    </select> 
                    </div>
            
                    <div class="col-sm-3">
                        <label for="">Cantidad De Salida</label>
                            <input type="number" id="Cantidadalmacen" class="form-control" readonly >
                        </div>
                        <div class="col-sm-3">
                                <label for="">Cantidad A Reingresar</label>
                                    <input type="number" id="CantidadUnidadesSalida" class="form-control monto" min="1" onkeyup="multi();">
                                </div>
                    
                    <div class="col">
                    <br>
                    <input type="button" onClick="agregar_PT_reingreso();" value="Añadir Producto" class="btn btn-primary">
                    </div>
                        <br>
                        
                        <br>
                    </div>
                    </div>
                    </div>
                    <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-table"></i>
                     Habilitación Seleccionada</div>
                    <div class="card-body">
                    <div  style ="overflow:scroll;">
                    <table class="table table-bordered table-striped thead-dark" id="TablaPTR" style="width:auto;">
                            
                            <tr>
                                <th scope="col">SKU/Modelo</th>
                                <th scope="col">Clasificación</th>
                                <th scope="col">Tipo de Producto</th>
                                <th scope="col">Descripcion del Producto</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Cantidad de Salida</th>
                                <th scope="col">Cantidad A Reingresar</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            
                            <tbody>
        
                            </tbody>
                            
                        </table>
                    </div>
                    </div>
                        </div>
                        <br>
                    <button type="submit" class="btn btn-success form-control" >Crear Entrada</button>
                </form>
                
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src={{asset("js/agregar_PT_reingreso.js")}}></script>
        <script src={{asset("js/limpiar_entrada_habilitacion.js")}}></script>
        <script src={{asset("js/productos_terminados.js")}}></script>
        
              
        @endsection
            