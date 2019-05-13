function agregar_habilitacion_reingreso() {
 
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

   
        var tipoHabilitacion = document.getElementById("tipoHabilitacionDevolucion");
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
        if(campo3.value === "Seleccione una Clave de Habilitación"){
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

    
    
        var campo6 = document.createElement("input");
        campo6.type = "text";
        campo6.name = "CantidadUnidadesSalida[][CantidadUnidadesSalida]";
        campo6.value = document.getElementById("CantidadUnidadesSalida").value;
        campo6.readOnly = "true";
        campo6.required = "true"; 
    
   
        var campo7= document.createElement("input");
        campo7.type = "text";
        campo7.name = "CantidadUnidadesReingreso[][CantidadUnidadesReingreso]";
        campo7.value = document.getElementById("CantidadUnidadesReingreso").value;
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