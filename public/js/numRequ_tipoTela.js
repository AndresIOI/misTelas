$(function(){
    $(document).on('change','#numeroRequisicion', function onSelectnumeroRequisicionChange(event){
        var numeroRequisicion = $(this).val();

        $.get('/api/tipoTelas/Salida/'+numeroRequisicion, function (data) {
            var html = '<option value="" selected>Seleccione Tipo de Tela</option> ';
            for (let index = 0; index < data.length; index++) {
                html += '<option value="'+data[index]+'">'+data[index]+'</option>'
            }            
            $('#telaTipoReingreso').html(html);
        });
        
    });
});

