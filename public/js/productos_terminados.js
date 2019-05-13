$(function (){
    $(document).on('change','.sku',onSelectProducto);
    $(document).on('change','.skuSalida',onSelectProductoSalida);
    $(document).on('change','#talla',onSelectTalla);
    $(document).on('change','#numeroRequisicion',onSelectSalida);
    $(document).on('change','#skuReingresos',onSelectProductoReingreso);
    $(document).on('change','#tallaReingreso',onSelectCantidad);
    $(document).on('change','#factura', onSelectProductosDevolucion);
    $(document).on('change','#skuDevolucion', onSelectDetallesProducto);
    $(document).on('change','#tallaDevolucion',onSelectCantidadEntrada);
    $(document).on('change','#nuRe',onSelectnumeroRequisicionChange);
    $(document).on('change','#clasificacion_id', onSelectTipo);
});
function onSelectTipo(){
    var clasificacion_id = $(this).val();
    $.get('/api/clasificacion/'+clasificacion_id+'/tipos', function(data){
        var html = '<option value="" selected>Seleccione el tipo</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].tipo_producto+'</option>';          
        }        
        $('#tipo_id').html(html);
    });
}
function onSelectProducto() {
    var sku = $(this).val();
    if(sku != ''){
        $.get('/api/productoTerminado/detalles/'+sku, function(data){
            $('.clasificacion').val(data.clasificacion);
            $('.TipoProducto').val(data.tipo);
            $('.descripcion').val(data.descripcion);
            var html = '<option value="" selected>Seleccione la Talla</option>';
            for (let index = 0; index < data.tallas.length; index++) {
                html += '<option value="'+data.tallas[index].id+'">'+data.tallas[index].talla+'</option>';          
            }        
            $('.tallas_productos_terminados').html(html);
            
        });    
    }
}

function onSelectProductoSalida(){
    var sku = $(this).val();
    $.get('/api/productoTerminadoSalida/detalles/'+sku, function(data){        
        $('#clasificacion').val(data.clasificacion);
        $('#tipoP').val(data.tipo);
        $('#descripcion').val(data.descripcion); 
        
        var html = '<option value="" selected>Seleccione la Talla</option>';
        for (let index = 0; index < data.tallas.length; index++) {
            html += '<option value="'+data.tallas[index].id+'">'+data.tallas[index].talla+'</option>';          
        }        
        $('#talla').html(html);
    });    
}

function onSelectTalla(){
    var talla_id = $(this).val();
    var sku_id = $('#skuSalida').val();
    $.get('/api/talla/'+talla_id+'/producto/'+sku_id+'/detalles', function(data){
        $('#CantidadUnidadesAlmacen').val(data.cantidad);
        $('#PrecioU').val(data.precio_unitario);
    });
}

function onImporteTotal(){

    var e = $('#importeSalida').val();
    var importeTela = $('#Costo').val();
    if(importeTela != '' && importeTela > 0){
        var importeTotal = parseFloat(importeTela) + parseFloat(e);
        $('#importeSalida').val(importeTotal);
        $('#Costo').val('');
    }
    $('#Costo').val("");

}

function onSelectSalida(){
    var numeroRequisicion = $(this).val();
    $.get('/api/salida/'+numeroRequisicion+'/productos', function(data){        
        var html = '<option value="" selected>Seleccione Producto</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].sku+'</option>';          
        }        
        $('#skuReingresos').html(html);
    });
}

function onSelectProductoReingreso(){
    var producto_id = $(this).val();
    var numeroRequisicion = $('#numeroRequisicion').val();
    $.get('/api/salida/'+numeroRequisicion+'/producto/'+producto_id+'/detalles',function(data){
        $('#clasificacionReingreso').val(data.clasificacion);
        $('#tipoReingreso').val(data.tipo);
        $('#descripcionReingreso').val(data.descripcion);
        var html = '<option value="" selected>Seleccione la Talla</option>';
        for (let index = 0; index < data.tallas.length; index++) {
            html += '<option value="'+data.tallas[index].id+'">'+data.tallas[index].talla+'</option>';          
        }        
        $('#tallaReingreso').html(html);
    });
}

function onSelectCantidad(){
    var talla_id = $(this).val();
    var numeroRequisicion = $('#numeroRequisicion').val();
    var producto_id = $('#skuReingresos').val();

    $.get('/api/salida/'+numeroRequisicion+'/producto/'+producto_id+'/'+talla_id+'/cantidad',function(data) {
        $('#Cantidadalmacen').val(data);
    });
}

function onSelectProductosDevolucion() {
    var factura = $(this).val();
    console.log(factura);
    
    $.get('/api/entradaProductos/'+factura+'/productos', function (data) {
        var html = '<option value="" selected>Seleccione el SKU/Modelo</option>';
        for (let index = 0; index < data.length; index++) {
            html += '<option value="'+data[index].id+'">'+data[index].sku+'</option>';          
        }        
        $('#skuDevolucion').html(html); 
    });
}

function onSelectDetallesProducto() {
    var producto_id = $(this).val();
    var factura = $('#factura').val();

    $.get('/api/entradaProductos/'+factura+'/producto/'+producto_id+'/detalles', function (data) {
        $('#clasificacionDevolucion').val(data.clasificacion);
        $('#tipoPDevolucion').val(data.tipo);
        $('#descripcionDevolucion').val(data.descripcion);
        var html = '<option value="" selected>Seleccione la Talla</option>';
        for (let index = 0; index < data.tallas.length; index++) {
            html += '<option value="'+data.tallas[index].id+'">'+data.tallas[index].talla+'</option>';          
        }        
        $('#tallaDevolucion').html(html);
    });
}

function onSelectCantidadEntrada() {
    var talla_id = $(this).val();
    var producto_id = $('#skuDevolucion').val();
    var factura = $('#factura').val();

    $.get('/api/entradaProductos/'+factura+'/producto/'+producto_id+'/talla/'+talla_id+'/cantidad', function (data){
        $('#CantidadinventarioDevolucion').val(data);
    });
}

function onSelectnumeroRequisicionChange() {
    var numeroRequisicion = $(this).val();
        
        $.get('/api/contador/salidaProducto/'+numeroRequisicion, function (data) {
            if(data >= 3){
                alert("Ya alcanzo las maximas salidas posibles, este numero de requisicion");
            }else if(data > 0 && data < 3){
                $('#ltS').hide();
                $('#Tipo_salida').hide();
                $('#lO').hide();
                $('#iO').hide();
            }else {
                $('#ltS').show();
                $('#Tipo_salida').show();
                $('#lO').show();
                $('#iO').show();
            }
        });    
}