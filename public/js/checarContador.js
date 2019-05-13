$(function(){
    $(document).on('change','#nuRe', function onSelectnumeroRequisicionChange(event){
        var numeroRequisicion = $(this).val();
        
        $.get('/api/contador/'+numeroRequisicion, function (data) {
            if(data >= 3){
                alert("Ya alcanzo las maximas salidas posibles, este numero de requisicion");
            }
        });
        
    });
});