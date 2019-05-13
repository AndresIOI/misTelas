$(function(){
    $(document).on('change','#cveTelaDevolucion',function onSelectCveTelaChange(event){
        var cve_tela = $(this).val();
        var ordenCompra = $('#ordenCompra').val();

        $.get('/api/tela/'+cve_tela+'/'+ordenCompra+'/coloresDevolucion', function(data){
            var html = '<option value="" selected>Elige el color</option>'
            for (let i = 0; i < data.length; i++) {
                html += '<option value="'+data[i]+'">'+data[i]+'</option>';
            }
            $('#colorTelaDevolucion').html(html);
        });
    })
});