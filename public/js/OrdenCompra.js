$(function(){
    $('#ordenCompra').on('focusin', function(){
        $(this).data('val', $(this).val());
    });
    $(document).on('change','#ordenCompra', function onSelectnumeroRequisicionChange(event){
        var ordenCompra = $(this).val();

        var tipos = new Array();
        $(".tipos").each(function(){
            tipos.push($(this).val());
        });
        if(tipos.length > 0){
            $('#ordenCompra').val($(this).data('val'));
            return alert("No es posible cambiar de ORDEN DE COMPRA, ya que tienes agregadas TELAS.\nDebe de borrar las TELAS ingresadas para cambiar de ORDEN DE COMPRA");
        }
        $.get('/api/ordenCompra/'+ordenCompra+'/datos', function (data) {
            $('#proveedor').val(data[0]);            
            var html = '<option value="" selected>Seleccione Tipo de Tela</option> ';
            for (let index = 1; index < data.length; index++) {
                html += '<option value="'+data[index]+'">'+data[index]+'</option>'
            }            
            $('#telaTipoDevolucion').html(html);            
        });
        
    });
});