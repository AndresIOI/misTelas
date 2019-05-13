$(function(){
    $(document).on('change','#cveTelaReingreso',function onSelectCveTelaChange(event){
        var cve_tela = $(this).val();
        var numReq = $('#numeroRequisicion').val();

        $.get('/api/tela/'+cve_tela+'/'+numReq+'/coloresReingreso', function(data){
            var html = '<option value="" selected>Elige el color</option>'
            for (let i = 0; i < data.length; i++) {
                html += '<option value="'+data[i]+'">'+data[i]+'</option>';
            }
            $('#colorTelaReingreso').html(html);
        });
    })
});