@extends('layouts.index')
@section('titulo','Salida Productos Terminados')

@section('content')
@include('common.errors')
<form class="form-group" method="POST" action="{{route('Salida-Terminados.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Datos de Salida</div>
            <div class="card-body">
            <label for="">Remisión/Requisición</label>
            <input type="text" name="numRequisicion"  class="form-control" id="nuRe">
            <label id="lO">Nombre de Quién Ordenó la Salida</label>
					<select name="usuario_ordenS" id="iO"class="form-control">
                        <option value="" selected>Seleccione a la Persona</option>
                    @foreach($Nombre_userOrden as $user)
                        <option value="{{$user->id}}">{{$user->Nombre_userOrden}}</option>   
                    @endforeach 
                    </select>
            <label for="" id="ltS">Tipo de Salida</label>
            <select id="Tipo_salida"class="form-control" name="tipoSalida">
                    <option value="" selected>Seleccione el Tipo de Salida</option>
                @foreach($Tipo_venta as $venta)
                    <option value="{{$venta->id}}">{{$venta->Tipo_venta}}</option>   
                @endforeach 
                </select>
            <label for="">Importe Total de Salida</label>
            <input type="number" name="importeSalida"  class="form-control" id="importeSalida" readonly value=0>
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
                                    <select class="form-control skuSalida" id="skuSalida">
                                        <option value="" selected>Seleccione el SKU/Modelo</option>
                                        @foreach($p as $sku)
                                            <option value="{{$sku->producto->id}}">{{$sku->producto->SKU}}</option>
                                        @endforeach  
                                    </select> 
                            </div>
                            <div class="col-sm-4">
                                    <label for="">Clasificación</label>
                                    <input type="text" id="clasificacion"  class="form-control" readonly>
                                    </div>     
                    <div class="col-sm-4">
                    <label for="">Tipo de Producto</label>
                    <input type="text" id="tipoP"  class="form-control" readonly>
                    </div>
                     
                    <div class="col-sm-9">
                    <label for="">Descripción</label>
                    <input type="text" id="descripcion"  class="form-control" readonly>
                    </div>  
                    <div class="col-sm-3">
                    <label for="">Talla</label>
                    <select class="form-control" id="talla">
                        <option value="" selected>Seleccione la Talla</option>  
                    </select> 
                    </div>
            
                    <div class="col-sm-3">
                        <label for="">Cantidad Almacén</label>
                            <input type="number" id="CantidadUnidadesAlmacen" class="form-control" readonly >
                        </div>
                        <div class="col-sm-3">
                                <label for="">Cantidad A Salir</label>
                                    <input type="number" id="CantidadUnidadesSalida" class="form-control monto" min="1" onkeyup="multi();">
                                </div>
                    <div class="col-sm-3">
                    <label for="">Costo Unitario</label>
                        <input type="number" step="any" id="PrecioU" class="form-control monto" min="1" onkeyup="multi();" readonly>    
                    </div>
                    <div class="col-sm-3">
                    <label for="">Costo Total</label>
                        <input  class="form-control" id="Costo" type="text" readonly>
                    </div>
            
                    <div class="col">
                    <br>
                    <input type="button" onClick="agregar_PT_salida(); onImporteTotal();" value="Añadir Producto" class="btn btn-primary">
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
                    <table class="table table-bordered table-striped thead-dark" id="TablaPTS" style="width:auto;">
                            
                            <tr>
                                <th scope="col">SKU/Modelo</th>
                                <th scope="col">Clasificación</th>
                                <th scope="col">Tipo de Producto</th>
                                <th scope="col">Descripcion del Producto</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Cantidad de Almacén</th>
                                <th scope="col">Cantidad de Salida</th>
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
        
        <script src={{asset("js/agregar_PT_salida.js")}}></script>
        <script src={{asset("js/precioTotalTelas.js")}}></script>
        <script src={{asset("js/limpiar_entrada_habilitacion.js")}}></script>
        <script src={{asset("js/productos_terminados.js")}}></script>
        
              
        @endsection
            