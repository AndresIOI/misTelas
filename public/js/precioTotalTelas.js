function multi(){
    var total = 1;
    var change= false; //
    $(".monto").each(function(){
        if (!isNaN(parseFloat($(this).val()))) {
            change= true;
            total *= parseFloat($(this).val());
        }
    });
    // Si se modifico el valor , retornamos la multiplicación
    // caso contrario 0
    total = (change)? total:0;
    $('#Costo').val(total);
    //document.getElementById('Costo').innerHTML = total;
}

function importe_total(){
    var precio_unitario = $('.precio_unitario').val();
    var cantidad_salida = $('.monto').val();
    $('.importe_total').val(precio_unitario*cantidad_salida);

}