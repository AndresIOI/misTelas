$(function(){
    $(document).on('change','#telaTipo', function onSelectTela(event) {
        var tela = $(this).val();
        console.log(tela);
        

        $.get('/api/tipoTelaSalida/'+tela+'/telas', function (data){
            var html = '<option value="" selected>Seleccione Clave de Tela</option>'
            
            for (let i = 0; i < data.length; i++) {
                html += '<option value="'+data[i].id+'">'+data[i].cve+'</option>';
            }
            $('#cveTelaSalidas').html(html);
        });
    });
});

