function agregar_habilitacion() {
 
    var tabla = document.getElementById("TablaHabilitacion");
    
    
    

        var clasificacion_id = document.getElementById("clasificacion");
        var clasificacion = clasificacion_id.options[clasificacion_id.selectedIndex].text;
        var campo1 = document.createElement("input");
        campo1.type = "text";
        campo1.name = "clasificacion[][clasificacion]";
        campo1.value = clasificacion;
        campo1.readOnly = "true";
        if(campo1.value === "Elige la clasificación"){
            return alert("Debes seleccionar una CLASIFICACIÓN");
        }
    

   
        var tipoHabilitacion = document.getElementById("tipoHabilitacion");
        var tipoHabilitacion = tipoHabilitacion.options[tipoHabilitacion.selectedIndex].text;
        var campo2 = document.createElement("input");
        campo2.type = "text";
        campo2.name = "tipoHabilitacion[][tipoHabilitacion]";
        campo2.value = tipoHabilitacion;
        campo2.readOnly = "true";
        campo2.required="true";
        if(campo2.value === "Seleccione Tipo de Habilitación"){
            return alert("Debes seleccionar un TIPO DE HABILITACIÓN");
        }

        


        var clavehabilitacion = document.getElementById("clavehabilitacion");
        var clavehabilitacion = clavehabilitacion.options[clavehabilitacion.selectedIndex].text;   
        var campo3 = document.createElement("input");
        campo3.type = "text";
        campo3.name = "clavehabilitacion[][clavehabilitacion]";
        campo3.value = clavehabilitacion;
        campo3.readOnly = "true";
        if(campo3.value === "Seleccione Clave de Habilitación"){
            return alert("Debes seleccionar una CLAVE DE HABILITACIÓN");
        }
        


        var campo4 = document.createElement("input");
        campo4.type = "text";
        campo4.name = "HabilDes[][HabilDes]";
        campo4.value = document.getElementById("HabilDes").value;
        campo4.readOnly = "true";
        campo4.required = "true";


        var campo5 = document.createElement("input");
        campo5.type = "text";
        campo5.name = "HabilUni[][HabilUni]";
        campo5.value = document.getElementById("HabilUni").value;
        campo5.readOnly = "true";
        campo5.required = "true";

        var empaque_id = document.getElementById("empaqueHabilitacion");
        var empaque = empaque_id.options[empaque_id.selectedIndex].text;
        var campo6 = document.createElement("input");
        campo6.type = "text";
        campo6.name = "empaque[][empaque]";
        campo6.value = empaque;
        campo6.readOnly = "true";
        campo6.required = "true";
        if(campo6.value === "Seleccione Empaque"){
            return alert("Debes seleccionar un EMPAQUE");
        }
    
    
        var campo7 = document.createElement("input");
        campo7.type = "text";
        campo7.name = "CantidadUnidades[][CantidadUnidades]";
        campo7.value = document.getElementById("CantidadUnidades").value;
        campo7.readOnly = "true";
        campo7.required = "true";
        if (campo7.value.trim() == "") {
            campo7.focus();
            return alert("El campo CANTIDAD DE UNIDADES esta vació");     
        }
        if(campo7.value <=  "0"){
            return alert("El campo CANTIDAD DE UNIDADES no puede ser 0 o menor");
         }
    
   
        var campo8= document.createElement("input");
        campo8.type = "text";
        campo8.name = "PrecioU[][PrecioU]";
        campo8.value = document.getElementById("PrecioU").value;
        campo8.readOnly = "true";
        if (campo8.value.trim() == "") {
            campo8.focus();
            return alert("El campo PRECIO UNITARIO esta vació");     
        }
        if(campo8.value <=  "0"){
            return alert("El campo PRECIO UNITARIO no puede ser 0 o menor");
         }

        var campo9= document.createElement("input");
        campo9.type = "text";
        campo9.name = "Costo[][Costo]";
        campo9.value = document.getElementById("Costo").value;
        campo9.readOnly = "true";
        if(Number(campo9.value) > Number("999999")){
            return alert("El campo IMPORTE TOTAL no puede ser MAYOR A 999,999");
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