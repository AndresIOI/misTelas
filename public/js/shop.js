
$(document).ready(function(){
    $(".btn-update-item").on('click',function(e){
        var id = $(this).data('id');
        var href = $(this).data('href');
        var quantity = $("#product_"+ id).val();
        $.get('/api/producto/'+id+'/inventario/cantidad', function(data){
            quantity=Number.parseFloat(quantity);
            data =Number.parseFloat(data);
            if(quantity > data || quantity <= 0){
                return alert('Lo sentimos, en estos momentos no contamos con esa cantidad en stock\nó\nEl la cantidad que estas ingresando es menor o igual a 0');

            }else{
                e.preventDefault();
                window.location.href = href + "/" + quantity;
            }

        });

    });
});


