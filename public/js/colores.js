$(function(){
    $(document).on('change','#cveTelaSalidas',function onSelectCveTelaChange(event){
        var cve_tela = $(this).val();

        $.get('/api/tela/'+cve_tela+'/colores', function(data){
            var html = '<option value="" selected>Elige el color</option>'
            for (let i = 0; i < data.length; i++) {
                html += '<option value="'+data[i]+'">'+data[i]+'</option>';
            }
            $('#colorTela').html(html);
        });
    })
});