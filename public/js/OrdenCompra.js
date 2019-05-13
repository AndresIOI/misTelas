$(function(){
    $(document).on('change','#ordenCompra', function onSelectnumeroRequisicionChange(event){
        var ordenCompra = $(this).val();

        $.get('/api/ordenCompra/'+ordenCompra+'/datos', function (data) {
            $('#proveedor').val(data[0]);
            console.log(data);
            
            var html = '<option value="" selected>Seleccione Tipo de Tela</option> ';
            for (let index = 1; index < data.length; index++) {
                html += '<option value="'+data[index]+'">'+data[index]+'</option>'
            }            
            $('#telaTipoDevolucion').html(html);            
        });
        
    });
});