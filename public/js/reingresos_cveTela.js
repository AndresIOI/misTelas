$(function(){
    $(document).on('change','#telaTipoReingreso', function onSelectTela(event) {
        var tela = $(this).val();
        var numReq = $('#numeroRequisicion').val();
        
        $.get('/api/tipoTelaReingreso/'+tela+'/'+numReq+'/telas', function (data){
            var html = '<option value="" selected> Seleccione Clave de Tela</option>'
            for (let i = 0; i < data.length; i++) {
                html += '<option value="'+data[i].id+'">'+data[i].cve+'</option>';
            }
            $('#cveTelaReingreso').html(html);
        });
    });
});