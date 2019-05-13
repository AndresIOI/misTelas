function agregar_PT_salida() {
 
    var tabla = document.getElementById("TablaPTS");
    

        var sku_modelo = document.getElementById("skuSalida");
        var sku_modelo = sku_modelo.options[sku_modelo.selectedIndex].text;   
        var campo1 = document.createElement("input");
        campo1.type = "text";
        campo1.name = "sku_modelo[][sku_modelo]";
        campo1.value = sku_modelo;
        campo1.readOnly = "true";
        if (campo1.value.trim() == "") {
            campo1.focus();
            return alert("El campo SKU/MODELO esta vació");     
        }
        

        var tipoP = document.getElementById("tipoP").value;
        var campo2 = document.createElement("input");
        campo2.type = "text";
        campo2.name = "tipoP[][tipoP]";
        campo2.value = tipoP;
        campo2.readOnly = "true";
        if (campo2.value.trim() == "") {
            campo2.focus();
            return alert("El campo CLASIFICACIÓN esta vació");     
        }

        var clasificacion = document.getElementById("clasificacion").value;
        var campo3 = document.createElement("input");
        campo3.type = "text";
        campo3.name = "clasificacion[][clasificacion]";
        campo3.value = clasificacion;
        campo3.readOnly = "true";
        if (campo3.value.trim() == "") {
            campo3.focus();
            return alert("El campo TIPO DE PRODUCTO esta vació");     
        }

        var descripcion = document.getElementById("descripcion").value;
        var campo4 = document.createElement("input");
        campo4.type = "text";
        campo4.name = "descripcion[][descripcion]";
        campo4.value = descripcion;
        campo4.readOnly = "true";
        if (campo4.value.trim() == "") {
            campo4.focus();
            return alert("El campo DESCRIPCIÓN esta vació");     
        }

        var talla = document.getElementById("talla");
        var talla = talla.options[talla.selectedIndex].text;   
        var campo5 = document.createElement("input");
        campo5.type = "text";
        campo5.name = "talla[][talla]";
        campo5.value = talla;
        campo5.readOnly = "true";
        if (campo5.value.trim() == "Seleccione la Talla") {
            return alert("El campo TALLA esta vació");     
        }
        

        var CantidadUnidadesAlmacen = document.getElementById("CantidadUnidadesAlmacen").value;
        var campo6 = document.createElement("input");
        campo6.type = "text";
        campo6.name = "CantidadUnidadesAlmacen[][CantidadUnidadesAlmacen]";
        campo6.value = CantidadUnidadesAlmacen;
        campo6.readOnly = "true";
        if (campo6.value.trim() == "") {
            campo6.focus();
            return alert("El campo CANTIDAD ALMACÉN esta vació");     
        }

        var CantidadUnidadesSalida = document.getElementById("CantidadUnidadesSalida").value;
        var campo7 = document.createElement("input");
        campo7.type = "text";
        campo7.name = "CantidadUnidadesSalida[][CantidadUnidadesSalida]";
        campo7.value = CantidadUnidadesSalida;
        campo7.readOnly = "true";
        if (campo7.value.trim() == "") {
            campo7.focus();
            return alert("El campo CANTIDAD A SALIR esta vació");     
        }
        if(campo7.value <=  "0"){
            return alert("El campo CANTIDAD A SALIR no puede ser 0 o menor");
         }
         if(Number(campo7.value) > Number(campo6.value)){
            return alert("El campo CANTIDAD A SALIR debe ser menor o igual al campo CANTIDAD ALMACÉN");
         }


        var PrecioU = document.getElementById("PrecioU").value;
        var campo8 = document.createElement("input");
        campo8.type = "text";
        campo8.name = "PrecioU[][PrecioU]";
        campo8.value = PrecioU;
        campo8.readOnly = "true";
        if (campo1.value.trim() == "") {
            campo1.focus();
            return alert("El campo COSTO UNITARIO esta vació");     
        }

        var Costo = document.getElementById("Costo").value;
        var campo9 = document.createElement("input");
        campo9.type = "text";
        campo9.name = "Costo[][Costo]";
        campo9.value = Costo;
        campo9.readOnly = "true";
        if (campo1.value.trim() == "") {
            campo1.focus();
            return alert("El campo COSTO TOTAL esta vació");     
        }

        
        var campo10 = document.createElement("input");
        campo10.type = "button";
        campo10.value = "Borrar Fila";
        campo10.onclick = function() {
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
    var celda9 = fila.insertCell(8);
    var celda10 = fila.insertCell(9);

    
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