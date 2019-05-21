@extends('layouts.index')
@section('titulo','Salida Habilitación')
@section('content')
@include('common.errors')
<form class="form-group" method="POST" action="{{route('Salida-Habilitacion.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Datos de Salida</div>
            <div class="card-body">
            <label for="">Orden de Requisición</label>
            <input type="text" name="numRequisicion"  class="form-control" id="nuRe">
            <label for="">Número de Piezas a Realizar</label>
            <input type="number" name="piezas"  class="form-control" id="piezas" min="1">
            <label for="">Importe Total de Salida</label>
            <input type="number" name="importeSalida"  class="form-control" id="importeSalida" 
            readonly value="0" min="0">
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
                                    <select name="" id="clasificacion" class="form-control clasificacion" onchange="limpiarClasificacion();">
                                        <option value="" selected>Elige la clasificación</option>
                                    @foreach($clasificaciones as $clasificacion)
                                        <option value="{{$clasificacion->id}}">{{$clasificacion->clasificacion}}</option>
                                    @endforeach
                                    </select>   
                                </div>    
                <div class="col-sm-4">
                <label for="">Tipo de Habilitación</label>
                    <select name="" class="form-control tipoHabilitacion" id="tipoHabilitacion">
                        <option value="" selected>Seleccione Tipo de Habilitación</option>  
                    </select>
                </div>
                <div class="col-sm-4">
                <label for="">Clave de Habilitación</label>
                    <select name="" id="clavehabilitacion" class="telas form-control claveHabilitacion">  
                        <option value="" selected>Seleccione Clave de Habilitación</option> 
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
                <div class="col-sm-4">
                    <label for="">Cantidad en inventario</label>
                    <input type="text" class="form-control cantidad_inventario" disabled id="cantidad_inventario">
                </div>
                <div class="col-sm-4">
                    <label for="">Cantidad de salida</label>
                        <input type="number" name="" id="CantidadUnidades" class="form-control monto" min="1" onkeyup="importe_total();">
                    </div>
                <div class="col-sm-2">
                <label for="">Precio Unitario</label>
                    <input type="number" step="any" name="" id="PrecioU" class="form-control precio_unitario" min="1" onkeyup="importe_total();" disabled>    
                </div>
                <div class="col-sm-2">
                <label for="">Importe Total</label>
                    <input  class="form-control importe_total" id="Costo" type="text" name="" readonly min="1">
                </div>
                
                <div class="col">
                <br>
                <input type="button" onClick="agregar_habilitacion_salida(); limpiar_salida_habilitacion(); ImporteTotalSalida();" value="Añadir Producto" class="btn btn-primary" id="botonAgregar">
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
                            <th scope="col">Cantidad En inventario</th>
                            <th scope="col">Cantidad de Unidades</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Importe Total</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        
                        <tbody>
    
                        </tbody>
                        
                    </table>
                </div>
                </div>
                    </div>
                    <br>
                <button type="submit" class="btn btn-success form-control " >Generar Salida</button>
            </form>
            
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script src={{asset("js/agregar_habilitacion_salida.js")}}></script>
    <script src={{asset("js/precioTotalTelas.js")}}></script>
    <script src={{asset("js/habilitaciones.js")}}></script>
    <script src={{asset("js/limpiar_salida_habilitacion.js")}}></script>
    <script src={{asset("js/ImporteTotalSalida.js")}}></script>
    
          
    @endsection
