@extends('layouts.index')
@section('titulo','Entrada Tela')
@section('content')
@include('common.errors')

	<form class="" method="POST" action="{{route('Entrada-Tela.store')}}" >
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
                    @foreach($empleadosC as $empleado)
                        <option value="{{$empleado->id_usuario}}">{{$empleado->nombre_usuarioC}}</option>
                    @endforeach
                    </select>
                    <label>Proveedor</label>
                    <select name="proveedor" id=""class="form-control">
                        <option value="" selected>Seleccione Proveedor</option>
                    @foreach($provedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->nombreProveedor}}</option>   
                    @endforeach 
                    </select>
                    <br>
            </div>
            </div>
            <div class="card mb-3" >
            <div class="card-header">
              <i class="fas fa-table"></i>
             Selección de Telas</div>
            <div class="card-body ">
            <div class="row">
            <div class="col-sm-4">
            <label for="">Tipo de Tela</label>
                <select name="" class="tipoTelas form-control" id="tipoTela">
                    <option value="" selected>Selecciona el Tipo de Tela</option>  
                @foreach ($t_tela as $telat )
                    <option value="{{$telat->id_tipo_tela}}">{{$telat->tipo_tela}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-sm-4">
            <label for="">Clave de Tela</label>
                <select name="" id="cveTela" class="telas form-control">  
                    <option value="" selected>Seleccione Clave de Tela</option> 
                </select>
            </div>
            <div class="col-sm-4">
            <label for="">Color</label>
                <select name="" id="colorTela" class="form-control">
                    <option value="" selected>Elige el color</option>
                @foreach($colores as $color)
                    <option value="{{$color->id}}">{{$color->color}}</option>
                @endforeach
                </select>   
            </div>      
            <div class="col-sm-10">
            <label class="" for="">Descripción</label>
                <input type="text" name="" class="telaDescripcion form-control" id="telaDes" readonly>
            </div>  
            <div class="col-sm-2">
            <label for="">Unidades</label>
                <input type="text" class=" telaUnidades form-control" id="telaUni" readonly> 
            </div>
            <div class="col-sm-2">
            <label for="">Cantidad</label>
                <input type="number" name="" id="Cantidad" class="form-control monto" min="1"  onkeyup="multi();">
            </div>
            <div class="col-sm-2">
            <label for="">Número de Rollos</label>
                <input type="number" name="" class="form-control" min="1"  id="Rollos">
            </div>
            <div class="col-sm-2">
            <label for="">Ancho</label>
                <input type="number" name="" class="form-control" id="ancho" min="110">
            </div>
            <div class="col-sm-2">
            <label for="">Precio Unitario</label>
                <input type="number" step="any" name="" id="Precio" class="form-control monto" min="1" onkeyup="multi();">    
            </div>
            <div class="col-sm-4">
            <label for="">Importe Total</label>
                <input  class="form-control" id="Costo" type="text" name="" readonly>
            </div>
            
            <div class="col">
            <br>
            <input type="button" onClick="agregar_tela(); limpiar_entrada_tela();" value="Añadir Producto" class="btn btn-primary">
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
            <table class="table table-bordered table-striped thead-dark" id="tablaTelas" style="width:auto;">
                    
                    <tr>
                        <th scope="col">Tipo de tela</th>
                        <th scope="col">Clave Tela</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Color</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Número de Rollos</th>
                        <th scope="col">Ancho</th>
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
<script src={{asset("js/agregar_tela.js")}}></script>
<script src={{asset("js/precioTotalTelas.js")}}></script>
<script src={{asset("js/entradas_tipoTelas.js")}}></script>
<script src={{asset("js/limpiar_entrada_tela.js")}}></script>
<script src={{asset("js/propiedadesTelas.js")}}></script>

      
@endsection
    
