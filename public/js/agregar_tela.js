function agregar_tela() {
 
 var tabla = document.getElementById("tablaTelas");
 
//  var fila = tabla.insertRow();
 
//  var celda1 = fila.insertCell(0);
//  var celda2 = fila.insertCell(1);
//  var celda3 = fila.insertCell(2);
//  var celda4 = fila.insertCell(3);
//  var celda5 = fila.insertCell(4);
//  var celda6 = fila.insertCell(5);
//  var celda7 = fila.insertCell(6);
//  var celda8 = fila.insertCell(7);
//  var celda9 = fila.insertCell(8);
//  var celda10 = fila.insertCell(9);
//  var celda11 = fila.insertCell(10);
//  var celda12 = fila.insertCell(11);
 

 var tipoTela = document.getElementById("tipoTela");

 var nombreTipoTela = tipoTela.options[tipoTela.selectedIndex].text;

 var campo1 = document.createElement("input");
     campo1.type = "text";
     campo1.name = "t_tela[][t_tela]";
     campo1.value = nombreTipoTela;
     campo1.readOnly = "true";
     if(campo1.value === "Selecciona el Tipo de Tela"){
         return alert("Debes seleccionar un TIPO DE TELA");
     }

     
     
 var clave_tela_id = document.getElementById("cveTela");
 var nombreClave = clave_tela_id.options[clave_tela_id.selectedIndex].text;
 var campo_clave_tela = document.createElement("input");
     campo_clave_tela.type = "text";
     campo_clave_tela.value = nombreClave;
 var claveTela = document.getElementById("cveTela").value;
 
 var campo2 = document.createElement("input");
     campo2.type = "text";
     campo2.name = "clave_tela[][clave_tela]";
     campo2.value = claveTela;
     campo2.hidden = "true";
     campo2.required="true";

     if(campo_clave_tela.value === "Seleccione Clave de Tela"){
        return alert("Debes seleccionar una CLAVE DE TELA");

    }

 
 var descripcionTela = document.getElementById("telaDes").value;
 
 
 var campo3 = document.createElement("input");
     campo3.type = "text";
     campo3.name = "descripcionTela[][descripcionTela]";
     campo3.value = descripcionTela;
     campo3.readOnly = "true";
     
 var campo4 = document.createElement("input");
     campo4.type = "text";
     campo4.name = "unidadTela[][unidadTela]";
     campo4.value = document.getElementById("telaUni").value;
     campo4.readOnly = "true";
 
 var inputColor = document.getElementById("colorTela");
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
     campo6.name = "cantidadTela[][cantidadTela]";
     campo6.value = document.getElementById("Cantidad").value;
     campo6.readOnly = "true";
     if (campo6.value.trim() == "") {
        campo6.focus();
        return alert("El campo CANTIDAD esta vació");
    }
    if(campo6.value <=  "0"){
        return alert("El campo CANTIDAD no puede ser 0 o menor");
     }

 var campo7 = document.createElement("input");
     campo7.type = "text";
     campo7.name = "Rollos[][Rollos]";
     campo7.value = document.getElementById("Rollos").value;
     campo7.readOnly = "true";
     if (campo7.value.trim() == "") {
        campo7.focus();
        return alert("El campo NUMERO DE ROLLOS esta vació");
    }
    if(campo7.value <=  "0"){
        return alert("El campo NUMERO DE ROLLOS no puede ser 0 o menor");
     }
     if(campo7.value % 1 != 0){
        return alert("El campo NUMERO DE ROLLOS no puede tener decimales");
     }
 
 var campo8 = document.createElement("input");
     campo8.type = "text";
     campo8.name = "anchoTela[][anchoTela]";
     campo8.value = document.getElementById("ancho").value;
     campo8.readOnly = "true";  
     if (campo8.value.trim() == "") {
        campo8.focus();
        return alert("El campo ANCHO esta vació");
    }
    if(campo8.value <=  "0"){
        return alert("El campo ANCHO no puede ser 0 o menor");
     }
 
 var campo9 = document.createElement("input");
     campo9.type = "text";
     campo9.name = "precioUTela[][precioUTela]";
     campo9.value = document.getElementById("Precio").value;
     campo9.readOnly = "true";
     campo9.required = "true";
     if (campo9.value.trim() == "") {
        campo9.focus();
        return alert("El campo PRECIO UNITARIO esta vació");
    }
    if(campo9.value <=  "0"){
        return alert("El campo PRECIO UNITARIO no puede ser 0 o menor");
     }

 var campo10 = document.createElement("input");
     campo10.type = "text";
     campo10.name = "importeTotal[][importeTotal]";
     campo10.value = document.getElementById("Costo").value;
     campo10.readOnly = "true";

 var campo11 = document.createElement("input");
     campo11.type = "button";
     campo11.value = "Borrar Fila";
     campo11.onclick = function() {
     
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
     var celda11 = fila.insertCell(10);
     var celda12 = fila.insertCell(11);
 
 celda1.appendChild(campo1);
 celda2.appendChild(campo_clave_tela);
 celda3.appendChild(campo3);
 celda4.appendChild(campo4);
 celda5.appendChild(campo5);
 celda6.appendChild(campo6);
 celda7.appendChild(campo7);
 celda8.appendChild(campo8);
 celda9.appendChild(campo9);
 celda10.appendChild(campo10);   
 celda11.appendChild(campo11);
 celda12.appendChild(campo2);
 celda12.hidden="true";
}

function vaciar_campo(input) {
 
 input.value = "";
 
}