$(function(){
    // Obtenemos el evento de la etiqueta con el id select-tipoTela
    // y realizamos la funcion correspondiente
    $(document).on('change','.tipoTelas', function onSelectTipoTelaChange(event){
        var tipoTela_id = $(this).val();
        
        
    /*$('.telaDescripcion').val("");
    $('.telaUnidades').val("");*/
    
   /* if (! tipoTela_id) {
        $('.telas').html('<option value="" selected> Seleccione Tela</option>');
        return;
    }    */
    // Ajax
        $.get('/api/tipoTelas/'+tipoTela_id+'/telas', function (data){
            var html = '<option value="" selected>Seleccione Clave de Tela</option>'
            for (let i = 0; i < data.length; i++) {
                html += '<option value="'+data[i].id+'">'+data[i].cve_tela+'</option>';
            }
            $('.telas').html(html);
        });
    });
});
