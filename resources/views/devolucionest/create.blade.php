@extends('layouts.index')
@section('titulo','Devolución Productos Terminados')
@section('content')
@include('common.errors')
	<form class="form-group" method="POST" action="{{route('Devolucion-Terminados.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Datos de Devolución</div>
            <div class="card-body">
            <div class="row">
                <div class="col-12">
                <label for="">Factura/Requisición</label>
					<input type="text" name="factura"  class="form-control factura" id="factura">
                </div>
            </div>
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
                                    <select class="form-control" id="skuDevolucion" name="skuDevolucion">
                                        <option value="" selected>Seleccione el SKU/Modelo</option>  
                                    </select> 
                                    </div>
                            <div class="col-sm-4">
                                    <label for="">Clasificación</label>
                                    <input type="text" id="clasificacionDevolucion"  class="form-control" name="clasificacionDevolucion" readonly>
                                    </div>     
                    <div class="col-sm-4">
                    <label for="">Tipo de Producto</label>
                    <input type="text" id="tipoPDevolucion" name="tipoPDevolucion"  class="form-control" readonly>
                    </div>
                     
                    <div class="col-sm-9">
                    <label for="">Descripción</label>
                    <input type="text" id="descripcionDevolucion"  class="form-control" readonly>
                    </div>  
                    <div class="col-sm-3">
                    <label for="">Talla</label>
                    <select class="form-control" id="tallaDevolucion">
                        <option value="" selected>Seleccione la Talla</option>  
                    </select> 
                    </div>
            
                    <div class="col-sm-6 ">
                        <label for="">Cantidad De Unidades en Inventario</label>
                            <input type="number" id="CantidadinventarioDevolucion" class="form-control" readonly >
                        </div>
                        <div class="col-sm-6">
                                <label for="">Cantidad De Unidades a Devolver</label>
                                    <input type="number" id="CantidadUnidadesSalidaDevolucion" class="form-control monto" min="1" onkeyup="multi();">
                                </div>
                    
                    <div class="col">
                    <br>
                    <input type="button" onClick="agregar_PT_devolucion();" value="Añadir Producto" class="btn btn-primary">
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
                    <table class="table table-bordered table-striped thead-dark" id="TablaPTD" style="width:auto;">
                            
                            <tr>
                                <th scope="col">SKU/Modelo</th>
                                <th scope="col">Clasificación</th>
                                <th scope="col">Tipo de Producto</th>
                                <th scope="col">Descripcion del Producto</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Cantidad En Inventario</th>
                                <th scope="col">Cantidad A Devolver</th>
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
        
        <script src={{asset("js/agregar_PT_devolucion.js")}}></script>
        <script src={{asset("js/limpiar_entrada_habilitacion.js")}}></script>
        <script src={{asset("js/productos_terminados.js")}}></script>
        
              
        @endsection
            