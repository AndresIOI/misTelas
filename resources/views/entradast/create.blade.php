@extends('layouts.index')
@section('titulo','Entrada Productos Terminados')
@section('content')
@include('common.errors')

	<form class="" method="POST" action="{{route('Entrada-Terminados.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Datos de Entrada</div>
            <div class="card-body">
                    <label for="">Factura/Requsición</label>
                    <input type="text" name="num_entrada"  class="form-control">
					<label>Nombre de quien Recibe</label>
					<select name="usuarioT" id=""class="form-control">
                        <option value="" selected>Seleccione Empleado</option>
                    @foreach($nombre_usuarioT as $empleado)
                        <option value="{{$empleado->id}}">{{$empleado->nombre_usuarioT}}</option>   
                    @endforeach 
                    </select>
                    <label for="">Número de Piezas Totales</label>
                    <input type="number" name="piezas"  class="form-control" min="1">
					<label>Tipo de Producción</label>
                    <select name="produccion" id="" class="form-control">
                        <option value="" selected>Seleccione el tipo de producción</option>
                    @foreach($Tipo_produccion as $produccion)
                        <option value="{{$produccion->id}}">{{$produccion->Tipo_produccion}}</option>
                    @endforeach
                    </select>
                    <label>Maquilero</label>
                    <select name="maquilero" id="" class="form-control">
                        <option value="" selected>Seleccione Maquilero</option>
                    @foreach($nombre_maquilero as $maquilero)
                        <option value="{{$maquilero->id}}">{{$maquilero->nombre_maquilero}}</option>   
                    @endforeach 
                    </select>
                    <label for="">Fecha</label> 
                    <input type="text" name="fecha"  class="form-control"  value ="{{$fecha}}" readonly>
                    <br>
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
                        <select name="" id="sku" class="form-control sku">
                            <option value="" selected>Seleccione un SKU</option>
                            @foreach ($productos as $producto)
                                <option value="{{$producto->SKU}}">{{$producto->SKU}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Clasificación</label>
                        <input  class="form-control clasificacion" id="clasificacion" type="text" name="" readonly>
                        </div> 
            <div class="col-sm-4">
            <label for="">Tipo de Producto</label>
            <input  class="form-control TipoProducto" id="TipoProducto" type="text" name="" readonly>
            </div>
             
            <div class="col-sm-9">
            <label for="">Descripción</label>
            <input  class="form-control descripcion" id="descripcion" type="text" name="" readonly>
            </div>  
            <div class="col-sm-3">
            <label for="">Talla</label>
            <select name="" class="form-control tallas_productos_terminados" id="talla">
                <option value="" selected>Seleccione la Talla</option>  
            </select> 
            </div>
    
            <div class="col-sm-4">
                <label for="">Cantidad de Unidades</label>
                    <input type="number" name="" id="CantidadUnidades" class="form-control monto" min="1" onkeyup="multi();">
                </div>
            <div class="col-sm-4">
            <label for="">Costo Unitario</label>
                <input type="number" step="any" name="" id="PrecioU" class="form-control monto" min="1" onkeyup="multi();">    
            </div>
            <div class="col-sm-4">
            <label for="">Costo Total</label>
                <input  class="form-control" id="Costo" type="text" name="" readonly>
            </div>
            
            <div class="col">
            <br>
            <input type="button" onClick="agregar_PT_Entrada();" value="Añadir Producto" class="btn btn-primary">
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
            <table class="table table-bordered table-striped thead-dark" id="TablaPT" style="width:auto;">
                    
                    <tr>
                        <th scope="col">SKU/Modelo</th>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Tipo de Producto</th>
                        <th scope="col">Descripcion del Producto</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Cantidad de Unidades</th>
                        <th scope="col">Costo Unitario</th>
                        <th scope="col">Costo Total</th>
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

<script src={{asset("js/agregar_PT_Entrada.js")}}></script>
<script src={{asset("js/productos_terminados.js")}}></script>
<script src={{asset("js/precioTotalTelas.js")}}></script>
<script src={{asset("js/limpiar_entrada_habilitacion.js")}}></script>


      
@endsection
    