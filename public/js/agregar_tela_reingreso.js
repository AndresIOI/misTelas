

function agregar_tela() {
 
 var tabla = document.getElementById("tablaTelasSalida");
 


 
 var tipoTela = document.getElementById("telaTipoReingreso");
 var nombreTipoTela = tipoTela.options[tipoTela.selectedIndex].text;
 
 var campo1 = document.createElement("input");
     campo1.type = "text";
     campo1.name = "t_tela[][t_tela]";
     campo1.value = nombreTipoTela;
     campo1.readOnly = "true";
     if(campo1.value === "Seleccione Tipo de Tela"){
        return alert("Debes seleccionar un TIPO DE TELA");
    }

     var clave_tela_id = document.getElementById("cveTelaReingreso");
var nombreClave = clave_tela_id.options[clave_tela_id.selectedIndex].text;
var campo_clave_tela = document.createElement("input");
         campo_clave_tela.type = "text";
         campo_clave_tela.value = nombreClave;
         

 var claveTela = document.getElementById("cveTelaReingreso").value;
 var campo2 = document.createElement("input");
     campo2.type = "text";
     campo2.name = "clave_tela[][clave_tela]";
     campo2.value = claveTela;
     campo2.readOnly = "true";
     if(campo_clave_tela.value === "Seleccione Clave de Tela"){
        return alert("Debes seleccionar una CLAVE DE TELA");
    }
 
 var descripcionTela = document.getElementById("telaDesReingreso").value;
 
 
 var campo3 = document.createElement("input");
     campo3.type = "text";
     campo3.name = "descripcionTela[][descripcionTela]";
     campo3.value = descripcionTela;
     campo3.readOnly = "true";
     
 var campo4 = document.createElement("input");
     campo4.type = "text";
     campo4.name = "unidadTela[][unidadTela]";
     campo4.value = document.getElementById("telaUniReingreso").value;
     campo4.readOnly = "true";
 
 var inputColor = document.getElementById("colorTelaReingreso");
 var colorTela = inputColor.options[inputColor.selectedIndex].text;
    
 var campo5 = document.createElement("input");
     campo5.type = "text";
     campo5.name = "color[][color]";
     campo5.value = colorTela;
     campo5.readOnly = "true";
     if(campo5.value === "Elige el color"){
        return alert("Debes seleccionar un COLOR");
    }

 var campo6 = document.createElement("input");
     campo6.type = "text";
     campo6.name = "cantidadSalida[][cantidadSalida]";
     campo6.value = document.getElementById("cantidadSalida").value;
     campo6.readOnly = "true";

 var campo7 = document.createElement("input");
     campo7.type = "text";
     campo7.name = "cantidadReingreso[][cantidadReingreso]";
     campo7.value = document.getElementById("cantidadReingreso").value;
     campo7.readOnly = "true";
     if (campo7.value.trim() == "") {
        campo7.focus();
        return alert("El campo CANTIDAD REINGRESO esta vació");
    }
    if(campo7.value <=  "0"){
        return alert("El campo CANTIDAD DE LA DEVOLUCIÓN no puede ser 0 o menor");
     }
    if(Number(campo7.value) > Number(campo6.value)){
        return alert("El campo CANTIDAD DE REINGRESO debe ser menor o igual al campo CANTIDAD DE SALIDA");
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
     var celda9 = fila.insertCell(8);
 
 celda1.appendChild(campo1);
 celda2.appendChild(campo_clave_tela);
 celda3.appendChild(campo3);
 celda4.appendChild(campo4);
 celda5.appendChild(campo5);
 celda6.appendChild(campo6);
 celda7.appendChild(campo7);
 celda8.appendChild(campo8);
 celda9.appendChild(campo2);
 celda9.hidden="true";

}

function vaciar_campo(input) {
 
 input.value = "";
 
}