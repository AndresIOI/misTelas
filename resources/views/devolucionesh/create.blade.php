@extends('layouts.index')
@section('titulo','Devolución Habilitación')
@section('content')
@include('common.errors')
	<form class="form-group" method="POST" action="{{route('Devolucion-Habilitacion.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Datos de Devolución</div>
            <div class="card-body">
            <div class="row">
                <div class="col-6">
                <label for="">Orden de Compra</label>
					<input type="text" name="orden_compra"  class="form-control ordenCompraDevolucion" id="ordenCompra">
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
                 Selección de Habilitación</div>
                <div class="card-body">
                <div class="row">
                        <div class="col-sm-4">
                                <label for="">Clasificación</label>
                                    <select name="" id="clasificacion" class="form-control clasificacionDevolucion">
                                        <option value="" selected>Elige la clasificación</option>
                                    </select>   
                                </div>    
                <div class="col-sm-4">
                <label for="">Tipo de Habilitación</label>
                    <select name="" class="form-control tipoHabilitacionDevolucion" id="tipoHabilitacionDevolucion">
                        <option value="" selected>Seleccione Tipo de Habilitación</option>  
                    </select>
                </div>
                <div class="col-sm-4">
                <label for="">Clave de Habilitación</label>
                    <select name="" id="clavehabilitacion" class="telas form-control claveHabilitacionDevolucion">  
                        <option value="" selected>Seleccione una Clave de Habilitación</option> 
                    </select>
                </div>  
                <div class="col-sm-10">
                <label for="">Descripción</label>
                    <input type="text" name="" class="form-control descripcion_habilitacion" id="HabilDes" readonly>
                </div>  
                <div class="col-sm-2">
                <label for="">Unidades</label>
                    <input type="text" class="form-control unidades_habilitacion" id="HabilUni" readonly> 
                </div>
                <div class="col-sm-6">
                    <label for="">Cantidad de Unidades en Almacén</label>
                        <input type="number" name="" id="CantidadUnidadesSalida" class="form-control" disabled>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Cantidad de Unidades a Devolver</label>
                            <input type="number" name="" id="CantidadUnidadesReingreso" class="form-control" min="1" >
                        </div>
                
                <div class="col">
                <br>
                <input type="button" onClick="agregar_habilitacion_reingreso();" value="Añadir Producto" class="btn btn-primary">
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
                <table class="table table-bordered table-striped thead-dark" id="TablaHabilitacion" style="width:auto;">
                        
                        <tr>
                            <th scope="col">Clasificación de habilitación</th>
                            <th scope="col">Tipo de Habilitación</th>
                            <th scope="col">Clave de Habilitación</th>
                            <th scope="col">Descripcion de Habilitación</th>
                            <th scope="col">Unidades</th>
                            <th scope="col">Cantidad de Unidades en Almacén</th>
                            <th scope="col">Cantidad de Unidades a Devolver</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        
                        <tbody>
    
                        </tbody>
                        
                    </table>
                </div>
                </div>
                    </div>
                    <br>
                <button type="submit" class="btn btn-success form-control" >Generar Devolución</button>
            </form>
            
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script src={{asset("js/agregar_habilitacion_devolucion.js")}}></script>
    <script src={{asset("js/precioTotalTelas.js")}}></script>
    <script src={{asset("js/habilitaciones.js")}}></script>
    
          
    @endsection