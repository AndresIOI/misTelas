$(function(){
    $(document).on('change','#colorTelaDevolucion', function onSelectColorTelaChange(event) {
        var color = $(this).val();
        var cve_tela = $('#cveTelaDevolucion').val();

        
        $.get('/api/tela/'+cve_tela+'/'+color+'/cantidaDevolucion', function (data) {
            $('#cantidadDisponibleDevolucion').val([data]);
        })
    });
});