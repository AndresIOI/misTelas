function agregar_PT_Entrada() {
 
    var tabla = document.getElementById("TablaPT");
  
   

    var sku = document.getElementById("sku").value;
    var campo1 = document.createElement("input");
    campo1.type = "text";
    campo1.name = "skue[][skue]";
    campo1.value = sku;
    campo1.readOnly = "true";
    if (campo1.value.trim() == "") {
        campo1.focus();
        return alert("El campo SKU/MODELO esta vació");     
    }


        var clasificacion = document.getElementById("clasificacion").value;
        var campo2 = document.createElement("input");
        campo2.type = "text";
        campo2.name = "clasificacion[][clasificacion]";
        campo2.value = clasificacion;
        campo2.readOnly = "true";


        var TipoProducto = document.getElementById("TipoProducto").value;   
        var campo3 = document.createElement("input");
        campo3.type = "text";
        campo3.name = "TipoProducto[][TipoProducto]";
        campo3.value = TipoProducto;
        campo3.readOnly = "true";

        var descripcion = document.getElementById("descripcion").value;
        var campo4 = document.createElement("input");
        campo4.type = "text";
        campo4.name = "descripcion[][descripcion]";
        campo4.value = descripcion;
        campo4.readOnly = "true";


        var talla = document.getElementById("talla");
        var talla = talla.options[talla.selectedIndex].text;   
        var campo5 = document.createElement("input");
        campo5.type = "text";
        campo5.name = "talla[][talla]";
        campo5.value = talla;
        campo5.readOnly = "true";
        if(campo5.value === "Seleccione la Talla"){
            return alert("Debes seleccionar una TALLA");
        }


        var CantidadUnidades = document.getElementById("CantidadUnidades").value;
        var campo6 = document.createElement("input");
        campo6.type = "number";
        campo6.name = "CantidadUnidades[][CantidadUnidades]";
        campo6.value = CantidadUnidades;
        campo6.readOnly = "true";
        if (campo6.value.trim() == "") {
            campo6.focus();
            return alert("El campo CANTIDAD DE UNIDADES esta vació");     
        }
        

        var PrecioU = document.getElementById("PrecioU").value;
        var campo7 = document.createElement("input");
        campo7.type = "number";
        campo7.name = "PrecioU[][PrecioU]";
        campo7.value = PrecioU;
        campo7.readOnly = "true";
        if (campo7.value.trim() == "") {
            campo7.focus();
            return alert("El campo COSTO UNITARIO esta vació");     
        }


        var Costo = document.getElementById("Costo").value;
        var campo8 = document.createElement("input");
        campo8.type = "number";
        campo8.name = "Costo[][Costo]";
        campo8.value = Costo;
        campo8.readOnly = "true";
        if(Number(campo8.value) > Number("999999")){
            return alert("El campo IMPORTE TOTAL no puede ser MAYOR A 999,999");
         }

        
        var campo9 = document.createElement("input");
        campo9.type = "button";
        campo9.value = "Borrar Fila";
        campo9.onclick = function() {
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

        celda1.appendChild(campo1);
        celda2.appendChild(campo2);
        celda3.appendChild(campo3);
        celda4.appendChild(campo4);
        celda5.appendChild(campo5);
        celda6.appendChild(campo6);
        celda7.appendChild(campo7);
        celda8.appendChild(campo8);
        celda9.appendChild(campo9);
   }
   function vaciar_campo(input) {
    
    input.value = "";
    
   }