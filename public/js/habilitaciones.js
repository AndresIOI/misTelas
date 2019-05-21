$(function (){
    $(document).on('change','.clasificacion',onSelectClasificacion);
    $(document).on('change','.clasificacionReingreso',onSelectTipoReingreso);
    $(document).on('change','.tipoHabilitacion',onSelectTipoHabilitacion);
    $(document).on('change','.claveHabilitacion',onSelectClaveHabilitacion);
    $(document).on('change','.numeroRequisicion',onSelectClasificacionReingreso);
    $(document).on('change','.tipoHabilitacionReingreso',onSelectHabilitacionReingreso);
    $(document).on('change','.claveHabilitacionReingreso',onSelectHabilitacionDescripcionReingreso);
    $(document).on('change','.ordenCompraDevolucion',onSelectClasificacionDevolucion);
    $(document).on('change','.clasificacionDevolucion',onSelectTipoDevolucion);
    $(document).on('change','.tipoHabilitacionDevolucion',onSelectClaveDevolucion);
    $(document).on('change','.claveHabilitacionDevolucion',onSelectDetallesDevolucion);
    $(document).on('change','#nuRe',onSelectnumeroRequisicionChange);
});

function onSelectClasificacion(){
    if(location.href == "http://104.248.223.212/Salida-Habilitacion/create" || location.href == "http://127.0.0.1:8000/Salida-Habilitacion/create" ){
        var ruta = "salida";
    }else if(location.href == "http://104.248.223.212/Entrada-Habilitacion/create" || location.href == "http://127.0.0.1:8000/Entrada-Habilitacion/create"){
        var ruta = "entrada";
    }
    var clasificacion = $(this).val();
    $.get('/api/clasificacion/'+clasificacion+'/'+ruta+'/tipoHabilitacion', function(data){
	console.log(clasificacion);
        var html = '<option value="" selected>Seleccione Tipo de Habilitación</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].tipos_habilitaciones+'</option>';          
        }        
        $('.tipoHabilitacion').html(html);
    });
}

function onSelectTipoHabilitacion(){
    if(location.href == "http://104.248.223.212/Salida-Habilitacion/create" || location.href == "http://127.0.0.1:8000/Salida-Habilitacion/create" ){
        var ruta = "salida";
    }else if(location.href == "http://104.248.223.212/Entrada-Habilitacion/create" || location.href == "http://127.0.0.1:8000/Entrada-Habilitacion/create"){
        var ruta = "entrada";
    }
    var tipo_habilitacion = $(this).val();
    $.get('/api/tipoHabilitacion/'+tipo_habilitacion+'/'+ruta+'/habilitaciones', function(data){
        
        var html = '<option value="" selected>Seleccione Clave de Habilitación</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].clave+'</option>';     
        }
        $('.claveHabilitacion').html(html);
    });
}

function onSelectClaveHabilitacion(){
    if(location.href == "http://104.248.223.212:80/Salida-Habilitacion/create" || location.href == "http://127.0.0.1:8000/Salida-Habilitacion/create"){
        var ruta = "salida";
    }else if(location.href == "http://104.248.223.212:80/Entrada-Habilitacion/create" || location.href == "http://127.0.0.1:8000/Entrada-Habilitacion/create"){
        var ruta = "entrada";
    }
    var clave_habilitacion = $(this).val();
    $.get('/api/habilitacion/'+clave_habilitacion+'/'+ruta, function(data){
        if(ruta == "entrada"){
            $('.descripcion_habilitacion').val(data.descripcion);
            $('.unidades_habilitacion').val(data.unidad);
        }else if(ruta = "salida"){
            $('.descripcion_habilitacion').val(data[0].descripcion);
            $('.unidades_habilitacion').val(data[0].unidad);   
            $('.precio_unitario').val(data[0].precio_unitario);
            $('.cantidad_inventario').val(data[0].cantidad_inventario);
        }
    });
}
$('#numeroRequisicion').on('focusin', function(){
    $(this).data('val', $(this).val());
});
function onSelectClasificacionReingreso(){
    var numeroRequisicion = $(this).val();    
    var clasificaciones = new Array();
    $(".clasificaciones").each(function(){
        clasificaciones.push($(this).val());
    });

    if(clasificaciones.length > 0){
        $('#numeroRequisicion').val($(this).data('val'));
        return alert("No es posible cambiar de ORDEN DE REQUISICION, ya que tienes agregadas HABILITACIONES.\nDebe de borrar las HABILITACIONES ingresadas para cambiar de ORDEN DE REQUISICION");
    }else{
        $.get('/api/clasificacionHabilitacion/reingreso/'+numeroRequisicion, function (data){        
            var html = '<option value="" selected>Elige la clasificacion</option>';
            for (let index = 0; index < data.length; index++) {
                html += '<option value="'+data[index].id+'">'+data[index].clasificacion+'</option>';          
            }        
            $('.clasificacionReingreso').html(html);
        });
    }
}

function onSelectTipoReingreso(){
    var clasificacion = $(this).val();
    var numero_requisicion = $('#numeroRequisicion').val();
    $.get('/api/clasificacion/'+clasificacion+'/'+numero_requisicion+'/tipoHabilitacion/reingreso', function(data){
        var html = '<option value="" selected>Seleccione el Tipo de Habilitación</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].tipos_habilitaciones+'</option>';          
        }        
        $('.tipoHabilitacionReingreso').html(html);
    });
}

function onSelectHabilitacionReingreso(){
    var tipo = $(this).val();
    var numero_requisicion = $('#numeroRequisicion').val();
    $.get('/api/clasificacion/'+tipo+'/'+numero_requisicion+'/tipoHabilitacion/habilitacion/reingreso', function(data){
        var html = '<option value="" selected>Seleccione una Clave de Habilitación</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].clave+'</option>';          
        }        
        $('.claveHabilitacionReingreso').html(html);
    });
}

function onSelectHabilitacionDescripcionReingreso(){
    var habilitacion = $(this).val();
    var numero_requisicion = $('#numeroRequisicion').val();
    $.get('/api/habilitacion/'+habilitacion+'/'+numero_requisicion+'/detalles', function(data){
        $('#HabilDes').val(data[0].descripcion);
        $('#HabilUni').val(data[0].unidad);
        $('#CantidadUnidadesSalida').val(data[0].pivot.cantidad);     
    });
}
$('#ordenCompra').on('focusin', function(){
    $(this).data('val', $(this).val());
});
function onSelectClasificacionDevolucion(){
    var orden_compra = $(this).val();
    
    var clasificaciones = new Array();
    $(".clasificaciones").each(function(){
        clasificaciones.push($(this).val());
    });
    if(clasificaciones.length > 0){
        $('#ordenCompra').val($(this).data('val'));
        return alert("No es posible cambiar de ORDEN DE COMPRA, ya que tienes agregadas HABILITACIONES.\nDebe de borrar las HABILITACIONES ingresadas para cambiar de ORDEN DE COMPRA");
    }else{
        $.get('/api/clasificacion/'+orden_compra+'/devolucion', function(data){                
            var html = '<option value="" selected>Elige la clasificación</option>';
            for (let index = 0; index < data.clasificaciones.length; index++) {
                html += '<option value="'+data.clasificaciones[index].id+'">'+data.clasificaciones[index].clasificacion+'</option>';          
            }        
            $('#proveedor').val(data.proveedor.nombre_proveedorH)
            $('.clasificacionDevolucion').html(html);
        });
    }

}

function onSelectTipoDevolucion(){
    var clasificacion_id = $(this).val();
    var orden_compra = $('#ordenCompra').val();
    $.get('/api/clasificacion/'+clasificacion_id+'/'+orden_compra+'/tipoHabilitacion/devolucion', function(data){
        var html = '<option value="" selected>Seleccione Tipo de Habilitación</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].tipos_habilitaciones+'</option>';          
        }        
        $('.tipoHabilitacionDevolucion').html(html);
    });
}

function onSelectClaveDevolucion(){
    var tipo = $(this).val();
    var orden_compra = $('#ordenCompra').val();
    $.get('/api/clasificacion/'+tipo+'/'+orden_compra+'/tipoHabilitacion/clave/devolucion', function(data){
        var html = '<option value="" selected>Seleccione una Clave de Habilitación</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].clave+'</option>';          
        }        
        $('.claveHabilitacionDevolucion').html(html);
    });
}

function onSelectDetallesDevolucion(){
    var clave = $(this).val();
    var orden_compra = $('#ordenCompra').val();
    $.get('/api/clasificacion/'+clave+'/'+orden_compra+'/tipoHabilitacion/clave/detalle/devolucion', function(data){        
        $('#HabilDes').val(data.detalles.descripcion);
        $('#HabilUni').val(data.detalles.unidad);
        $('#CantidadUnidadesSalida').val(data.cantidad_inventario);
    });
}







function onSelectnumeroRequisicionChange() {
    var numeroRequisicion = $(this).val();
        
        $.get('/api/contador/salidaHabilitacion/'+numeroRequisicion, function (data) {
            if(data >= 3){
                alert("Ya alcanzo las maximas salidas posibles, este numero de requisicion");
            }
        });    
}
