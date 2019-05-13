$(function(){
    $(document).on('change','.telas',onSelectCveTelaChange);
    $(document).on('change','#cantidadSalida',onSelectCantidadTelaChange);
    $(document).on('click','#botonAgregar',onImporteTotal);
});

function onImporteTotal(){
    var e = $('#importeSalida').val();
    var importeTela = $('#importeTotal').val();
    if (importeTela != '' && importeTela > 0) {
        var importeTotal = parseFloat(importeTela) + parseFloat(e);
        $('#importeSalida').val(importeTotal);
        document.getElementById("importeTotal").value="";       
    }
    $('#importeTotal').val("");
}

function onSelectCantidadTelaChange(){
    var cantidadSalida = $('#cantidadSalida').val();
    var precioUnitario = $('#precioUnitario').val();

    var importeTotal = cantidadSalida*precioUnitario;
    $('#importeTotal').val(importeTotal);

    
}

function onSelectCveTelaChange(){    
    var cve_id = $(this).val();
    console.log(cve_id);

    if (! cve_id) {
        $('.telaDescripcion').val("");
        $('.telaUnidades').val("");
        return;
    }    
    // Ajax
    $.get('/api/tela/'+cve_id, function(data){
        $('.telaDescripcion').val(data[0].descripcion);
        $('.telaUnidades').val(data[0].unidad);
        
    });
    $.get('/api/tela/'+cve_id+'/precioUnitario', function(data1s){

        $('#precioUnitario').val(data1s);
        
    });
}

