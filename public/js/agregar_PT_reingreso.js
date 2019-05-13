function agregar_PT_reingreso() {
 
    var tabla = document.getElementById("TablaPTR");
 
   
    

    var sku = document.getElementById("skuReingresos");
    var sku = sku.options[sku.selectedIndex].text;   
    var campo1 = document.createElement("input");
    campo1.type = "text";
    campo1.name = "sku[][sku]";
    campo1.value = sku;
    campo1.readOnly = "true";
    if(campo1.value === "Seleccione Producto"){
        return alert("Debes seleccionar un SKU/MODELO");
    }

        var clasificacion = document.getElementById("clasificacionReingreso").value;
        var campo2 = document.createElement("input");
        campo2.type = "text";
        campo2.name = "clasificacion[][clasificacion]";
        campo2.value = clasificacion;
        campo2.readOnly = "true";
        if (campo2.value.trim() == "") {
            campo2.focus();
            return alert("El campo CLASIFICACIÓN esta vació");
        }

        var tipoP = document.getElementById("tipoReingreso").value;
        var campo3 = document.createElement("input");
        campo3.type = "text";
        campo3.name = "tipoP[][tipoP]";
        campo3.value = tipoP;
        campo3.readOnly = "true";
        if (campo3.value.trim() == "") {
            campo3.focus();
            return alert("El campo TIPO DE PRODUCTO esta vació");
        }

        

        var descripcion = document.getElementById("descripcionReingreso").value;
        var campo4 = document.createElement("input");
        campo4.type = "text";
        campo4.name = "descripcion[][descripcion]";
        campo4.value = descripcion;
        campo4.readOnly = "true";
        if (campo4.value.trim() == "") {
            campo4.focus();
            return alert("El campo DESCRIPCIÓN esta vació");
        }

        var talla = document.getElementById("tallaReingreso");
        var talla = talla.options[talla.selectedIndex].text;   
        var campo5 = document.createElement("input");
        campo5.type = "text";
        campo5.name = "talla[][talla]";
        campo5.value = talla;
        campo5.readOnly = "true";
        if(campo5.value === "Seleccione la Talla"){
            return alert("Debes seleccionar una Talla");
        }
        

        var Cantidadalmacen = document.getElementById("Cantidadalmacen").value;
        var campo6 = document.createElement("input");
        campo6.type = "text";
        campo6.name = "Cantidadalmacen[][Cantidadalmacen]";
        campo6.value = Cantidadalmacen;
        campo6.readOnly = "true";
        if (campo6.value.trim() == "") {
            campo6.focus();
            return alert("El campo CANTIDAD DE SALIDA esta vació");
        }

        var CantidadUnidadesSalida = document.getElementById("CantidadUnidadesSalida").value;
        var campo7 = document.createElement("input");
        campo7.type = "text";
        campo7.name = "CantidadUnidadesSalida[][CantidadUnidadesSalida]";
        campo7.value = CantidadUnidadesSalida;
        campo7.readOnly = "true";
        if (campo7.value.trim() == "") {
            campo7.focus();
            return alert("El campo CANTIDAD A REINGRESAR esta vació");
        }
        if(campo7.value <=  "0"){
            return alert("El campo CANTIDAD A REINGRESAR no puede ser 0 o menor");
         }
         if(Number(campo7.value) > Number(campo6.value)){
            return alert("El campo CANTIDAD A REINGRESAR debe ser menor o igual al campo CANTIDAD EN INVENTARIO");
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
    celda9.appendChild(campo9);
    celda10.appendChild(campo10);
    
   }
   function vaciar_campo(input) {
    
    input.value = "";
    
   }