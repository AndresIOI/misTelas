$(function(){
    $(document).on('change','#colorTela', function onSelectColorTelaChange(event) {
        var color = $(this).val();
        var cve = $('#cveTelaSalidas').val();

        
        $.get('/api/tela/'+cve+'/'+color+'/cantida', function (data) {
            $('#cantidadInventario').val([data]);
        })
    });
});