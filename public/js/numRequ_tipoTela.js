$(function(){    
    $('#numeroRequisicion').on('focusin', function(){
        $(this).data('val', $(this).val());
    });
    $(document).on('change','#numeroRequisicion', function onSelectnumeroRequisicionChange(event){
        var numeroRequisicion = $('#numeroRequisicion').val();    
        
        var tipos = new Array();
        $(".tipos").each(function(){
            tipos.push($(this).val());
        });
        if(tipos.length > 0){
            $('#numeroRequisicion').val($(this).data('val'));
            return alert("No es posible cambiar de numero de requisicion, ya que agregaste telas de otro numero de requisicion.\nDebe de borrar la TELA ingresada para cambiar de numero de requisicion");
        }else{
            $.get('/api/tipoTelas/Salida/'+numeroRequisicion, function (data) {
                var html = '<option value="" selected>Seleccione Tipo de Tela</option> ';
                for (let index = 0; index < data.length; index++) {
                    html += '<option value="'+data[index]+'">'+data[index]+'</option>'
                }            
                $('#telaTipoReingreso').html(html);
            });
        }

    });
});

