$(document).ready(function(){
    $('#alerta').hide();
    var requ = $('#Requi').val();
    
    $('#boton').click(function(e){
        e.preventDefault();
        if(! confirm("¿Estas seguro de reiniciar el contador?")){
            return false;
        }
        $.get('/api/reiniciarContadorProducto/'+requ,function(data){
            location.reload();
        })
        
    });
});