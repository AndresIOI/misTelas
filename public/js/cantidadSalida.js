$(function(){
    $(document).on('change','#colorTelaReingreso', function onSelectColorTelaChange(event) {
        var color = $(this).val();
        var cve = $('#cveTelaReingreso').val();
        var numReq = $('#numeroRequisicion').val();

        
        $.get('/api/tela/'+cve+'/'+color+'/'+numReq+'/cantida', function (data) {
            $('#cantidadSalida').val([data]);
        })
    });
});