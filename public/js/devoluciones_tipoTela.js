$(function(){
    $(document).on('change','#telaTipoDevolucion', function onSelectTela(event) {
        var tela = $(this).val();
        var ordenCompra = $('#ordenCompra').val();
        
        $.get('/api/tipoTelaDevolucion/'+tela+'/'+ordenCompra+'/telas', function (data){
            var html = '<option value="" selected>Seleccione Clave de de Tela</option>'
            for (let i = 0; i < data.length; i++) {
                html += '<option value="'+data[i].id+'">'+data[i].cve+'</option>';
            }
            $('#cveTelaDevolucion').html(html);
        });
    });
});
