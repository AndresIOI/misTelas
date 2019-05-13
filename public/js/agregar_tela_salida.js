
function agregar_tela() {
 
 var tabla = document.getElementById("tablaTelasSalida");
 


 
 var tipoTela = document.getElementById("telaTipo");
 var nombreTipoTela = tipoTela.options[tipoTela.selectedIndex].text;
 
 var campo1 = document.createElement("input");
     campo1.type = "text";
     campo1.name = "t_tela[][t_tela]";
     campo1.value = nombreTipoTela;
     campo1.readOnly = "true";
     if(campo1.value === "Seleccione Tipo de Tela"){
        return alert("Debes seleccionar un TIPO DE TELA");
    }

var clave_tela_id = document.getElementById("cveTelaSalidas");
var nombreClave = clave_tela_id.options[clave_tela_id.selectedIndex].text;
var campo_clave_tela = document.createElement("input");
         campo_clave_tela.type = "text";
         campo_clave_tela.value = nombreClave;
         
 var claveTela = document.getElementById("cveTelaSalidas").value;
 var campo2 = document.createElement("input");
     campo2.type = "text";
     campo2.name = "clave_tela[][clave_tela]";
     campo2.value = claveTela;
     campo2.readOnly = "true";
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
     campo6.type = "number";
     campo6.name = "cantidadTela[][cantidadTela]";
     campo6.value = document.getElementById("cantidadInventario").value;
     campo6.readOnly = "true";

 var campo7 = document.createElement("input");
     campo7.type = "number";
     campo7.name = "cantidadSalida[][cantidadSalida]";
     campo7.value = document.getElementById("cantidadSalida").value;
     campo7.readOnly = "true";
     if (campo7.value.trim() == "") {
        campo7.focus();
        return alert("El campo CANTIDAD DE SALIDA esta vació");
    }
    if(campo7.value <=  "0"){
        return alert("El campo CANTIDAD DE LA DEVOLUCIÓN no puede ser 0 o menor");
     }
     if(Number(campo7.value) > Number(campo6.value)){
        return alert("El campo CANTIDAD DE SALIDA debe ser menor o igual al campo CANTIDAD DISPONIBLE");
     }
     


 var campo8 = document.createElement("input");
     campo8.type = "button";
     campo8.value = "Borrar Fila";
     campo8.onclick = function() {
     
         var fila = this.parentNode.parentNode;
         var tbody = tabla.getElementsByTagName("tbody")[0];
         
         tbody.removeChild(fila);
         
     }
var campo9 = document.createElement("input");
    campo9.type = "text";
    campo9.name = "precioUnitario[][precioUnitario]";
    campo9.value = document.getElementById("precioUnitario").value;
    campo9.readOnly = "true";

var campo10 = document.createElement("input");
    campo10.readOnly = true ;
    campo10.type = "text";
    campo10.name = "importeTotal[][importeTotal]";
    campo10.value = document.getElementById("importeTotal").value;
    campo10.readOnly = "true";


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
 
 celda1.appendChild(campo1);
 celda2.appendChild(campo_clave_tela);
 celda3.appendChild(campo3);
 celda4.appendChild(campo4);
 celda5.appendChild(campo5);
 celda6.appendChild(campo6);
 celda7.appendChild(campo7);
 celda8.appendChild(campo9);
 celda9.appendChild(campo10);
 celda10.appendChild(campo8);
 celda11.appendChild(campo2);
 celda11.hidden="true";


}

function vaciar_campo(input) {
 
 input.value = "";
 
}