function agregar_PT_devolucion() {
 
    var tabla = document.getElementById("TablaPTD");
    
        var sku = document.getElementById("skuDevolucion");
        var sku = sku.options[sku.selectedIndex].text;   
        var campo1 = document.createElement("input");
        campo1.type = "text";
        campo1.name = "sku[][sku]";
        campo1.value = sku;
        campo1.readOnly = "true";
        if(campo1.value === "Seleccione el SKU/Modelo"){
            return alert("Debes seleccionar un SKU/Modelo");
        }


        var clasificacion = document.getElementById("clasificacionDevolucion").value;
        var campo2 = document.createElement("input");
        campo2.type = "text";
        campo2.name = "clasificacion[][clasificacion]";
        campo2.value = clasificacion;
        campo2.readOnly = "true";

        var tipoP = document.getElementById("tipoPDevolucion").value;
        var campo3 = document.createElement("input");
        campo3.type = "text";
        campo3.name = "tipoP[][tipoP]";
        campo3.value = tipoP;
        campo3.readOnly = "true";

        

        var descripcion = document.getElementById("descripcionDevolucion").value;
        var campo4 = document.createElement("input");
        campo4.type = "text";
        campo4.name = "descripcion[][descripcion]";
        campo4.value = descripcion;
        campo4.readOnly = "true";

        var talla = document.getElementById("tallaDevolucion");
        var talla = talla.options[talla.selectedIndex].text;   
        var campo5 = document.createElement("input");
        campo5.type = "text";
        campo5.name = "talla[][talla]";
        campo5.value = talla;
        campo5.readOnly = "true";
        if(campo5.value === "Seleccione la Talla"){
            return alert("Debes seleccionar una TALLA");
        }
        

        var Cantidadinventario = document.getElementById("CantidadinventarioDevolucion").value;
        var campo6 = document.createElement("input");
        campo6.type = "text";
        campo6.name = "Cantidadinventario[][Cantidadinventario]";
        campo6.value = Cantidadinventario;
        campo6.readOnly = "true";

        var CantidadUnidadesSalida = document.getElementById("CantidadUnidadesSalidaDevolucion").value;
        var campo7 = document.createElement("input");
        campo7.type = "text";
        campo7.name = "CantidadUnidadesSalida[][CantidadUnidadesSalida]";
        campo7.value = CantidadUnidadesSalida;
        campo7.readOnly = "true";
        if (campo7.value.trim() == "") {
            campo7.focus();
            return alert("El campo CANTIDAD DE UNIDADES A DEVOLVER esta vació");
        }
        if(campo7.value <=  "0"){
            return alert("El campo CANTIDAD DE UNIDADES A DEVOLVER no puede ser 0 o menor");
         }
         if(Number(campo7.value) > Number(campo6.value)){
            return alert("El campo CANTIDAD DE UNIDADES A DEVOLVER debe ser menor o igual al campo CANTIDAD DE UNIDADES EN ALMACEN");
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