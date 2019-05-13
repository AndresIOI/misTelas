function agregar_habilitacion() {
 
    var tabla = document.getElementById("TablaPT");
    
        var sku = document.getElementById("sku");
        var campo1 = document.createElement("input");
        campo1.type = "text";
        campo1.name = "sku[][sku]";
        campo1.value = sku.value;
        campo1.readOnly = "true";

   
        var id_tipo = document.getElementById("TipoProducto");
        var tipo_producto = id_tipo.options[id_tipo.selectedIndex].text;
        var campo2 = document.createElement("input");
        campo2.type = "text";
        campo2.name = "tipo_producto[][tipo_producto]";
        campo2.value = tipo_producto;
        campo2.readOnly = "true";


        


        var id_clasificacion = document.getElementById("clasificacion");
        var clasificacion = id_clasificacion.options[id_clasificacion.selectedIndex].text;   
        var campo3 = document.createElement("input");
        campo3.type = "text";
        campo3.name = "clasificacion[][clasificacion]";
        campo3.value = clasificacion;
        campo3.readOnly = "true";
        

        var id_talla = document-getElementById('talla');
        var talla = id_talla.options[id_talla.selectedIndex].text;
        var campo4 = document.createElement("input");
        campo4.type = "text";
        campo4.name = "talla[][talla]";
        campo4.value = talla;
        campo4.readOnly = "true";
        campo4.required = "true";


        var campo5 = document.createElement("input");
        campo5.type = "text";
        campo5.name = "cantidad[][cantidad]";
        campo5.value = document.getElementById("CantidadUnidades").value;
        campo5.readOnly = "true";
        campo5.required = "true";
        if (campo5.value.trim() == "") {
            campo5.focus();
            return alert("El campo CANTIDAD DE UNIDADES esta vació");     
        }
        if(campo5.value <=  "0"){
            return alert("El campo CANTIDAD DE UNIDADES no puede ser 0 o menor");
         }


        var campo6 = document.createElement("input");
        campo6.type = "text";
        campo6.name = "costo_unitario[][costo_unitario]";
        campo6.value = document.getElementById("PrecioU").value;
        campo6.readOnly = "true";
        campo6.required = "true";
        if (campo6.value.trim() == "") {
            campo6.focus();
            return alert("El campo PRECIO UNITARIO esta vació");     
        }
        if(campo6.value <=  "0"){
            return alert("El campo PRECIO UNITARIO no puede ser 0 o menor");
         }
    
    
        var campo7 = document.createElement("input");
        campo7.type = "text";
        campo7.name = "costo_total[][costo_total]";
        campo7.value = document.getElementById("Costo").value;
        campo7.readOnly = "true";
        campo7.required = "true";
        if(Number(campo7.value) > Number("999999")){
            return alert("El campo IMPORTE TOTAL no puede ser MAYOR A 999,999");
         }
    
        var campo8 = document.createElement("input");
        campo8.type = "button";
        campo8.value = "Borrar Fila";
        campo8.onclick = function() {
            var fila = this.parentNode.parentNode;
            var tbody = tabla.getElementsByTagName("tbody")[0];
            tbody.removeChild(fila);
        }

        var fila = tabla.insertRow();
    
        
        var celda1 = fila.insertCell(0);
        var celda2 = fila.insertCell(1);
        var celda3 = fila.insertCell(2);
        var celda4 = fila.insertCell(3);
        var celda5 = fila.insertCell(4);
        var celda6 = fila.insertCell(5);
        var celda7 = fila.insertCell(6);
        var celda8 = fila.insertCell(7);

        celda1.appendChild(campo1);
        celda2.appendChild(campo2);
        celda3.appendChild(campo3);
        celda4.appendChild(campo4);
        celda5.appendChild(campo5);
        celda6.appendChild(campo6);
        celda7.appendChild(campo7);
        celda8.appendChild(campo8);

   }
   function vaciar_campo(input) {
    
    input.value = "";
    
   }