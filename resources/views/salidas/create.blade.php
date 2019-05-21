@extends('layouts.index')
@section('titulo','Salida de Tela')

@section('content')
@include('common.errors')
<form class="form-group" method="POST" action="{{route('Salida-Tela.store')}}" >
			@csrf
            <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Datos de Salida</div>
            <div class="card-body">
            <label for="">Número de Requisión</label>
            <input type="text" name="numRequisicion"  class="form-control" id="nuRe">
            <label for="">Número de Piezas a Realizar</label>
            <input type="number" name="piezas"  class="form-control" id="piezas" min="1">
            <label for="">Importe Total de Salida</label>
            <input type="number" name="importeSalida"  class="form-control" id="importeSalida" readonly value=0>
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
            <select name="" class="form-control" id="telaTipo" onchange="limpiarTipo();">
                                <option value="" selected>Seleccione Tipo de Tela</option>  
                            @foreach ($tiposTela as $telat )
                                <option value="{{$telat->id_tipo_tela}}">{{$telat->tipo_tela}}</option>
                            @endforeach
                            </select>
            </div>
            <div class="col-sm-4">
            <label for="">Clave de Tela</label>
            <select name="" id="cveTelaSalidas" class="telas form-control">  
                                <option value="" selected>Seleccione Clave de Tela</option> 
                            </select>
            </div>
            <div class="col-sm-4">
            <label for="">Color</label>
            <select name="" id="colorTela" class="form-control">
                                <option value="" selected>Elige el color</option>
                            </select>  
            </div>      
            <div class="col-sm-10">
            <label for="">Descripción</label>
            <input type="text" name="" class=" telaDescripcion form-control" id="telaDes" disabled>
            </div>  
            <div class="col-sm-2">
            <label for="">Unidades</label>
            <input type="text" class=" telaUnidades form-control" id="telaUni" disabled>
            </div>
            <div class="col-sm-4">
            <label for="">Cantidad en Inventario</label>
            <input type="number" name="" id="cantidadInventario" class="form-control" readonly>
            </div>
            <div class="col-sm-4">
            <label for="">Cantidad de Salida</label>
            <input type="number" name="" id="cantidadSalida" class="form-control monto" min="1" onkeyup="multi();">
            </div>
            <div class="col-sm-2">
            <label for="">Precio Unitario</label>
            <input type="number" name="" id="precioUnitario" class="form-control monto" readonly min="1" onkeyup="multi();">
            </div>
            <div class="col-sm-2">
            <label for="">Importe Total</label>
            <input type="number" name="" id="importeTotal" class="form-control" readonly>
            </div>
            <div class="col">
            <br>
            <input type="button" onClick="agregar_tela(); limpiar_salida_tela();" value="Añadir Producto" class="btn btn-primary" id = "botonAgregar">
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
                        <th scope="col">Descripción</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Color</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Cantidad de Salida</th>
                        <th scope="col">~ Precio Unitario</th>
                        <th scope="col">~ Importe Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    
                    <tbody>

                    </tbody>
                    
                </table>
                </div>
            </div>
            </div>
            
  
        
            <button type="submit" class="btn btn-primary form-control" >Generar Salida</button>
        </form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src={{asset("js/salidas_tipoTelas.js")}}></script>
<script src={{asset("js/propiedadesTelas.js")}}></script>
<script src={{asset("js/colores.js")}}></script>
<script src={{asset("js/cantidadDisponible.js")}}></script>
<script src={{asset("js/agregar_tela_salida.js")}}></script>
<script src={{asset("js/limpiar_salida_tela.js")}}></script>
<script src={{asset("js/checarContador.js")}}></script>
<script>
    function multi(){
    var total = 1;
    var change= false; //
    $(".monto").each(function(){
        if (!isNaN(parseFloat($(this).val()))) {
            change= true;
            total *= parseFloat($(this).val());
        }
    });
    // Si se modifico el valor , retornamos la multiplicación
    // caso contrario 0
    total = (change)? total:0;
    $('#importeTotal').val(total);
    //document.getElementById('Costo').innerHTML = total;
}
</script>

@endsection