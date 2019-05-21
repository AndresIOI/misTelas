@extends('layouts.index')
@section('titulo','Entrada Habilitación')
@section('content')
@include('common.errors')

	<form class="" method="POST" action="{{route('Entrada-Habilitacion.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Datos de Entrada</div>
            <div class="card-body">
            <label for="">Orden de Compra</label>
                    <input type="text" name="num_entrada"  class="form-control">
					<label for="">Clave Factura</label>
                    <input type="text" step="any" name="cve_factura"  class="form-control">
					<label for="">Fecha</label> 
                    <input type="text" name="fecha"  class="form-control"  value ="{{$fecha}}" readonly>
					<label>Nombre de quien Recibe</label>
                    <select name="OperarioRecepcion" id="" class="form-control">
                            <option value="" selected>Seleccione la persona quien recibio</option>
                            <option value="Recepcionista - Ana Guitierrez">Recepcionista - Ana Guitierrez</option>
                            <option value="Recepcionista - Laura Angeles">Recepcionista - Laura Angeles</option>
                            <option value="Vigilancia - Arturo Reyes">Vigilancia - Arturo Reyes</option>
                    </select>					
                    <label>Nombre de quien ordenó</label>
                    <select name="usuarioCompras" id="" class="form-control">
                        <option value="" selected>Seleccione Empleado</option>
                    @foreach($empleadosCH as $empleado)
                        <option value="{{$empleado->id}}">{{$empleado->nombre_usuarioCH}}</option>
                    @endforeach
                    </select>
                    <label>Proveedor</label>
                    <select name="proveedor" id=""class="form-control">
                        <option value="" selected>Seleccione Proveedor</option>
                    @foreach($nombre_proveedorH as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->nombre_proveedorH}}</option>   
                    @endforeach 
                    </select>
                    <br>
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
            <div class="col-sm-3">
                <label for="">Empaques</label>
                    <select name="" id="empaqueHabilitacion" class="telas form-control empaqueHabilitacion">  
                        <option value="" selected>Seleccione Empaque</option> 
                        @foreach($empaques as $empaque)
                            <option value="{{$empaque->id}}">{{$empaque->empaque}}</option>
                        @endforeach
                    </select>           
             </div>
            <div class="col-sm-3">
                <label for="">Cantidad de Unidades</label>
                    <input type="number" name="" id="CantidadUnidades" class="form-control monto" min="1" onkeyup="multi();">
                </div>
            <div class="col-sm-3">
            <label for="">Precio Unitario</label>
                <input type="number" step="any" name="" id="PrecioU" class="form-control monto" min="1" onkeyup="multi();">    
            </div>
            <div class="col-sm-3">
            <label for="">Importe Total</label>
                <input  class="form-control" id="Costo" type="text" name="" readonly>
            </div>
            
            <div class="col">
            <br>
            <input type="button" onClick="agregar_habilitacion(); limpiar_entrada_habilitacion();" value="Añadir Producto" class="btn btn-primary">
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
                        <th scope="col">Empaque</th>
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
            <button type="submit" class="btn btn-success form-control" >Crear Entrada</button>
        </form>
        



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src={{asset("js/agregar_habilitacion.js")}}></script>
<script src={{asset("js/precioTotalTelas.js")}}></script>
<script src={{asset("js/entradas_tipoTelas.js")}}></script>
<script src={{asset("js/limpiar_entrada_habilitacion.js")}}></script>
<script src={{asset("js/propiedadesTelas.js")}}></script>
<script src={{asset("js/habilitaciones.js")}}></script>

      
@endsection
    