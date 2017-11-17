 //Listener del onLoad
 window.onload = function() {
   

 
   if(document.getElementById('mostrarlistado').value==2){


   mostrar_listado2();
 }   
 

else if(document.getElementById('mostrarlistado').value==3){


    muestra()
 }




setInterval("verificar_nuevosmensajes()",5000);

  


 }

 document.onclick = clickEnDoc;



 function clickEnDoc(e) {
if(document.getElementById('tabla').value=="regalumnos"){

if(e.target.className!="btn btn-info calend"&&e.target.className!="col-md-6 cuadrocalend"&&e.target.className!="adelante"&&e.target.className!="atras"){
if (document.getElementById('calendario').style.display == "block"){

         document.getElementById('calendario').style.display = "none"

       document.getElementById('calendario').innerHTML = "";

     }


}}else{


    if (document.getElementById('asistente').style.display == "block"){

         document.getElementById('asistente').style.display = "none";

       document.getElementById('asistente').innerHTML = "";

     }
}
}

function completarfecha(){

var fechan=document.getElementById("ano").value+"-"+document.getElementById("mes").value+"-"+document.getElementById("nac").value
 document.getElementById('fechanac').value=fechan   
}

 // JavaScript Document

 //Llamo a la funcion resaltar

 function resaltar(valor) {

     //Genero un nodo para las filas

     var fila = document.getElementById("f" + valor)

         //Verifico si el checkbox esta chequeado. Utilizo "false" porque el click llama a la funcion y le da check al mismo tiempo

     if (document.getElementById("check" + valor).checked == false) {

         //Compruebo la clase que tenia la fila para devolverle su color original

         if (fila.className == "fila clara") {

             var color_fila = "rgba(255,255,255,.6)"

         } else {

             var color_fila = "#f9f9f9"

         }

         fila.style.backgroundColor = color_fila

     } else {

         //Al chequear, resalto la fila

         fila.style.backgroundColor = "rgba(85,1ua09,233,.05)"

     }

 }



 function abre_ventana() {

     document.getElementsByTagName('body')[0].scrollTop = 0

     document.getElementById("fondo").style.display = "block"

     document.getElementById("ventana").style.display = "block"

     document.documentElement.style.overflowX = "hidden";

     document.documentElement.style.overflowY = "hidden";

 }



 function nuevo() {

     $('#ventananuevo').modal('show');

     document.getElementById("formeditar").innerHTML = "";

     var tabla = document.getElementById("tabla").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/" + tabla + "/form_alta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formnuevo").innerHTML = ajax.responseText;

         }

     }

     ajax.send();

 }



 



 function verifica_paso() {

     var pagina = parseInt(document.getElementById("pagina").value);

     var canfilas = parseInt(document.getElementById("cant_filas").value)

     var paso = parseInt(document.getElementById("paso").value)

     if (paso > canfilas) {

         var filas = canfilas;

     } else {

         var filas = (Math.ceil(canfilas / paso) == pagina) ? canfilas - (paso * (pagina - 1)) : paso;

     }

     return filas;

 }



 function cerrar() {

     document.getElementById("fondo").style.display = "none"

     document.getElementById("ventana").style.display = "none"

     document.documentElement.style.overflowX = "visible";

     document.documentElement.style.overflowY = "visible";

 }



 function chequeo() {

     var filas = verifica_paso();

     if (document.getElementById("check_general").checked == true) {

         for (x = 1; x <= filas; x++) {

             document.getElementById("check" + x).checked = true

             resaltar(x)

         }

     } else {

         for (x = 1; x <= filas; x++) {

             document.getElementById("check" + x).checked = false

             resaltar(x)

         }

     }

 }



 function editar() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked == true) {

             chequeados++

             seleccionados += "|" + document.getElementById("check" + x).value

         }

     }

     if (chequeados > 1) {

         alert("Seleccione solo 1")

     } else if (chequeados == 0) {

         alert("Seleccione algun registro")

     } else {

         editando(seleccionados)

     }

 }



 function respuesta() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();



     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked == true) {

             chequeados++

             seleccionados += document.getElementById("check" + x).value

         }

     }

     if (chequeados > 1) {

         alert("Seleccione solo 1")

     } else if (chequeados == 0) {

         alert("Seleccione algun registro")

     } else {

         editandorespuesta(seleccionados)

     }

 }



 function editando(valor) {

      $('#ventanaeditar').modal('show');

      document.getElementById("formnuevo").innerHTML = "";

     var tabla = document.getElementById("tabla").value;

     var columnas = document.getElementById("columnas").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/" + tabla + "/editar.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             //mostrar_listado();

             document.getElementById("formeditar").innerHTML = ajax.responseText;

         }

     }

     ajax.send("seleccionados=" + valor + "&tabla=" + tabla + "&columnas=" + columnas);

 }

 function editandorespuesta(valor) {

      $('#ventanaeditar').modal('show');

      document.getElementById("formnuevo").innerHTML = "";

     var tabla = document.getElementById("tabla").value;

     var columnas = document.getElementById("columnas").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/" + tabla + "/respuesta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             //mostrar_listado();

             document.getElementById("formeditar").innerHTML = ajax.responseText;

             mostrar_respuestas(valor);

         }

     }

     ajax.send("seleccionados=" + valor + "&tabla=" + tabla + "&columnas=" + columnas);

 }

 function borrar() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked ==true) {

             chequeados++

            seleccionados += "|" + document.getElementById("check" + x).value

         }

     }

     if (chequeados == 0) {

         alert("seleccione un registro")

     } else {

         borrar_registro(seleccionados);

     }

 }
 function borrarregistroboletin() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked ==true) {

             chequeados++

            seleccionados += "|" + document.getElementById("check" + x).value

         }

     }

     if (chequeados == 0) {

         alert("seleccione un registro")

     } else {

         borrar_registroboletin(seleccionados);

     }

 }



  function borrarbackup() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked == true) {

             chequeados++

             seleccionados += "|" + document.getElementById("check" + x).value

         }

     }

     if (chequeados == 0) {

         alert("seleccione un registro")

     } else {

         eliminar_backup(seleccionados);

     }

 }



 function validarusuario(valor) {

    

     
         document.getElementById("miFormulario").submit()

     

 }

function validarfotousuario(valor) {

    

 

         document.getElementById("miFormulario").submit()

     

 }



function validaralumnos(valor) {

    

     var campos = new Array()

     var columnas = document.getElementById("columnas").value

     var tabla = document.getElementById("tabla").value







     var col = columnas.split("|");

     var expreg = /^\w+([\.-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,64})+$/;

     for (x = 0; x < col.length; x++) {

         campos[x] = document.getElementById("campo" + x).value

     }

     var juntos = campos.join("|");

     

     if(campos[0]==""){



alert("complete nombre")



    }else if (campos[1]=="") {

        alert("complete apellido")

        

    }else if (campos[2]=="") {

        alert("complete email")



        }else if (!expreg.test(campos[2])) {



        alert("email invalido")



    }



else if (campos[3]=="") {

        alert("seleccione pais")

        

    

    





    }else if (campos[4]==""&&valor==0) {



        alert("complete la contraseña")

        

    }else if (campos[4]!=document.getElementById("campo4a").value) {

        alert("las contraseñas no coinciden")



    } else {

         store(valor, juntos, columnas, tabla);

     }

 }



 



  function validarcurso(valor) {

    

     var campos = new Array()

     var columnas = document.getElementById("columnas").value

     var tabla = document.getElementById("tabla").value

     var col = columnas.split("|");

     for (x = 0; x < col.length; x++) {

         campos[x] = document.getElementById("campo" + x).value

     }

     var juntos = campos.join("|");

     if (campos[0] == "" || campos[1] == "") {

         alert("Complete todos los campos")

     } else {

         document.getElementById("miFormulario").submit()

     }

 }



function validarleccion(valor) {

    

     var campos = new Array()

     var columnas = document.getElementById("columnas").value

     var tabla = document.getElementById("tabla").value

     var col = columnas.split("|");

     for (x = 0; x < col.length; x++) {

         campos[x] = document.getElementById("campo" + x).value

     }

     var juntos = campos.join("|");

     if (campos[0] == "" || campos[1] == ""||campos[3] == ""||campos[4] == "") {

         alert("Complete todos los campos")

     } else {

        document.getElementById("miFormulario").submit()

     }

 }




 function validarcapitulo(valor) {

    

     var campos = new Array()

     var columnas = document.getElementById("columnas").value

     var tabla = document.getElementById("tabla").value

     var col = columnas.split("|");

     for (x = 0; x < col.length; x++) {

         campos[x] = document.getElementById("campo" + x).value;

     }

     var juntos = campos.join("|");

     if (campos[0] == "" || campos[1] == "") {

         alert("Complete todos los campos")

     } else {

         store(valor, juntos, columnas, tabla);

     }

 }

 



 function validarCategoria(valor) {

     var campos = new Array()

     var columnas = document.getElementById("columnas").value

     var tabla = document.getElementById("tabla").value

     var col = columnas.split("|");

     for (x = 0; x < col.length; x++) {

         campos[x] = document.getElementById("campo" + x).value

     }

     var juntos = campos.join("|");

     if (campos[0] == "") {

         alert("Complete el nombre de la categoría")

     } else {

         store(valor, juntos, columnas, tabla);

     }

 }



 function store(valor, juntos, columnas, tabla) {

    

     var ajax = new XMLHttpRequest();

     if (valor == 0) {

         ajax.open("post", "includes/alta.php", true);

         var vmodal="#ventananuevo"

     } else {

         ajax.open("post", "includes/modificar.php", true);

         var vmodal="#ventanaeditar"

     }

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

               document.getElementById("buscar").value = "";

             

             $(vmodal).modal('hide');



          

             mostrar_listado2();

         

            

        

         }

     }

     ajax.send("seleccionados=" + valor + "&datos=" + juntos + "&columnas=" + columnas + "&tabla=" + tabla);

 }



 function mostrar_todo() {

     document.getElementById("buscar").value = "";

     mostrar_listado2();

 }



 function asistente_busqueda(col_bus) {

     if (document.getElementById("asistente").style.display == "block") {

         var tabla = document.getElementById("tabla").value;

         var columnas = document.getElementById("columnas").value;

         var ajax = new XMLHttpRequest();

         ajax.open("post", "includes/asistente.php", true);

         ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         ajax.onreadystatechange = function() {

             if (ajax.readyState == 4) {

                 document.getElementById("asistente").innerHTML = ajax.responseText;

             }

         }

         ajax.send("clave=" + document.getElementById("buscar").value + "&tabla=" + tabla + "&columnas=" + columnas + "&col_busqueda=" + col_bus);

     } else {

         document.getElementById("asistente").style.display = "block";

     }


 }

function asistente_busquedanuevo(col_bus) {
   console.log(document.getElementById("buscar").value)
     if (document.getElementById("asistente").style.display == "block") {

         var tabla = document.getElementById("tabla").value;

         var columnas = document.getElementById("columnas").value;

         var ajax = new XMLHttpRequest();

         ajax.open("post", "includes/asistente2.php", true);

         ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         ajax.onreadystatechange = function() {

             if (ajax.readyState == 4) {

                 document.getElementById("asistente").innerHTML = ajax.responseText;

             }

         }

         ajax.send("clave=" + document.getElementById("buscar").value + "&tabla=" + tabla + "&columnas=" + columnas + "&col_busqueda=" + col_bus);
         console.log("clave=" + document.getElementById("buscar").value + "&tabla=" + tabla + "&columnas=" + columnas + "&col_busqueda=" + col_bus)
     } else {

         document.getElementById("asistente").style.display = "block";

     }


 }

 function filtrar(valor) {

     document.getElementById("buscar").value = valor;




mostrar_listado2();

  document.getElementById("buscar").value="";

 document.getElementById("asistente").style.display="none";

 }

 



  function mostrar_listado2() {

     var tabla = document.getElementById("tabla").value;

     

         var paso = document.getElementById("paso").value;

         var pagina = document.getElementById("pagina").value;

         var columnas = document.getElementById("columnas").value;

         var clave = document.getElementById("buscar").value;

         

       

         var ajax = new XMLHttpRequest();

         ajax.open("post", "includes/" + tabla + "/abm.php", true);

         ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         ajax.onreadystatechange = function() {

             if (ajax.readyState == 4) {



                document.getElementById("filas").innerHTML = ajax.responseText;

                 

                 var cant_filas = parseInt(document.getElementById("cant_filas").value);



                 if (pagina == 1) {

                     document.getElementById("atras").disabled = true;

                 }

                 if ((cant_filas)<(pagina * paso)){

                     document.getElementById("adelante").disabled =true;

                 }

             }

         }

         ajax.send("paso=" + paso + "&pagina=" + pagina + "&tabla=" + tabla + "&columnas=" + columnas + "&clave=" + clave);

    actualizarsaldo();

 }


 function cambio_paso() {

     document.getElementById("paso").value = document.getElementById("selector").value;

     document.getElementById("pagina").value = 1;

     mostrar_listado2();

     
 }




 function avanzar() {

     document.getElementById("atras").disabled = false;

     document.getElementById("pagina").value = parseInt(document.getElementById("pagina").value) + 1;

     mostrar_listado2();

    

 }



 function atras() {

     if (document.getElementById("pagina").value > 1) {

         document.getElementById("pagina").value = parseInt(document.getElementById("pagina").value) - 1;
mostrar_listado2();
     }



     
 }



 function borrar_registro(valor) {

     var tabla = document.getElementById("tabla").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/baja.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

            if(document.getElementById("mostrarlistado").value==2){

 if(ajax.responseText==""){mostrar_listado2();}
             else(alert(ajax.responseText))

              

            }else if(document.getElementById("mostrarlistado").value==1){

             if(ajax.responseText==""){mostrar_listado();}
             else(alert(ajax.responseText))
             



             }

             //document.getElementById("filas").innerHTML=ajax.responseText;

         }

     }

     ajax.send("seleccionados=" + valor + "&tabla=" + tabla);

 }
function borrar_registroboletin(valor) {

     var tabla = document.getElementById("tabla").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/bajaboletin.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

            if(document.getElementById("mostrarlistado").value==2){

 if(ajax.responseText==""){mostrar_listado2();}
             else(alert(ajax.responseText))

              

            }else if(document.getElementById("mostrarlistado").value==1){

             if(ajax.responseText==""){mostrar_listado();}
             else(alert(ajax.responseText))
             



             }

             //document.getElementById("filas").innerHTML=ajax.responseText;

         }

     }

     ajax.send("seleccionados=" + valor + "&tabla=" + tabla);

 }


  function eliminar_backup(valor) {

     var tabla = document.getElementById("tabla").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/backup/baja.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             mostrar_listado();

             

         }

     }

     ajax.send("seleccionados=" + valor + "&tabla=" + tabla);

 }





 function mostrarlistaBC() {

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/backup.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("filas").innerHTML = ajax.responseText;

         }

     }

     ajax.send("accion=listarBC");

 }



 function hacerBC() {

     var oHTTPRequest = new XMLHttpRequest();

     oHTTPRequest.open("post", "includes/backup.php", true);

     oHTTPRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     oHTTPRequest.onreadystatechange = function() {

         if (oHTTPRequest.readyState == 4) {

             mostrar_listado();

         }

     }

     oHTTPRequest.send("accion=hacerBC");

 }



 function eliminarBC(enlace) {

     if (confirm("eliminar Backup?")) {

         var oHTTPRequest = new XMLHttpRequest();

         oHTTPRequest.open("post", "includes/backup.php", true);

         oHTTPRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         oHTTPRequest.onreadystatechange = function() {

             if (oHTTPRequest.readyState == 4) {

                 mostrarlistaBC()

             }

         }

         oHTTPRequest.send("accion=eliminarBC&enlace=" + enlace);

     }

 }









 function imprimir() {

     var ficha = document.getElementById('formulario');

     var ventimp = window.open(' ', 'popimpr');

     ventimp.document.write(ficha.innerHTML);

     ventimp.document.close();

     ventimp.print();

     ventimp.close();

 }



 function cargacapitulos(){



  idcurso=document.getElementById("campo0").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/capitulos/cargacapitulos.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             

             document.getElementById("campo1").innerHTML=ajax.responseText;

             document.getElementById("campo1").disabled=false;

         }

     }

     ajax.send("idcurso=" + idcurso);











 }



 function cargacapitulosp(){



  idcurso=document.getElementById("campo0").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/preguntas/cargacapitulos.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             

             document.getElementById("campo1").innerHTML=ajax.responseText;

             document.getElementById("campo1").disabled=false;

         }

     }

     ajax.send("idcurso=" + idcurso);











 }

 function cargacapitulosl(){



  idcursol=document.getElementById("campo3").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "/admin/includes/lecciones/cargacapitulosl.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             

             document.getElementById("campo4").innerHTML=ajax.responseText;

             document.getElementById("campo4").disabled=false;

         }

     }

     ajax.send("idcurso=" + idcursol);











 }



function editarcurso() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked == true) {

             chequeados++

             seleccionados +=  document.getElementById("check" + x).value

         }

     }

     if (chequeados > 1) {

         alert("Seleccione solo 1")

     } else if (chequeados == 0) {

         alert("Seleccione algun registro")

     } else {

         location.href="includes/cursos/editar.php?idcurso="+seleccionados

     }

 }

function editarleccion() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked == true) {

             chequeados++

             seleccionados +=  document.getElementById("check" + x).value

         }

     }

     if (chequeados > 1) {

         alert("Seleccione solo 1")

     } else if (chequeados == 0) {

         alert("Seleccione algun registro")

     } else {

         location.href="includes/lecciones/editarleccion.php?idleccion="+seleccionados

     }

 }



 function orden(idcurso,nuevoorden){

 

  

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/cursos/orden.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             

            mostrar_listado();

         }

     }

     ajax.send("idcurso=" + idcurso+"&nuevoorden="+nuevoorden);





}



function ordenlecciones(idcurso,nuevoorden){



var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/lecciones/orden.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             

            mostrar_listado();

         }

     }

     ajax.send("idcurso=" + idcurso+"&nuevoorden="+nuevoorden);





}



function ordencapitulos(idcurso,nuevoorden){



var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/capitulos/ordenlecciones.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             

            mostrar_listado();

         }

     }

     ajax.send("idcurso=" + idcurso+"&nuevoorden="+nuevoorden);





}








 function agregarrespuesta(){



document.getElementById("ingresarrespuesta").style.display="block";



document.getElementById("linkagregar").style.display="none";







 }





 function guardarrespuesta(idpregunta){



  var textor=document.getElementById("textor").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/preguntas/guardarrespuesta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

           //alert(ajax.responseText)  

            mostrar_respuestas(idpregunta);

            document.getElementById("ingresarrespuesta").style.display="none";

         }

     }

     ajax.send("textor="+textor+"&idpregunta="+idpregunta);











 }

function borrarrespuesta(id,idpregunta){



  

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/preguntas/borrarrespuesta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

           //alert(ajax.responseText)  

            mostrar_respuestas(idpregunta);

         }

     }

     ajax.send("id="+id);











 }



 function mostrar_respuestas(idpregunta){



  var textor=document.getElementById("textor").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/preguntas/mostrarrespuesta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

            

            document.getElementById("listadorespuestas").innerHTML=ajax.responseText;



            document.getElementById("linkagregar").style.display="block";

            document.getElementById("textor").value="";



         }

     }

     ajax.send("idpregunta="+idpregunta);











 }



function editartextor(valor){



var texto=document.getElementById("contexto"+valor).innerHTML

document.getElementById("contexto"+valor).innerHTML='<input type="text" id="inputextor'+valor+'" value="'+texto+'"/>'

document.getElementById("botoneditar"+valor).style.display="none";

document.getElementById("botonguardar"+valor).style.display="block";





}





function guardartextor(idtexto,idpregunta){



  var textor=document.getElementById("inputextor"+idtexto).value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/preguntas/updaterespuesta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

            

          mostrar_respuestas(idpregunta);



         }

     }

     ajax.send("idtexto="+idtexto+"&textor="+textor);











 }







 function tuconsulta(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/boletin/form_respconsulta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formnuevo").innerHTML = ajax.responseText;


              
mostrar_listado2(valor);

         }

     }

     ajax.send("consulta="+valor);

 }


function verconsulta(nvalor) {

 
       
  $('#ventanaeditar').modal('show');

  
     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/boletin/verconsulta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formeditar").innerHTML = ajax.responseText;


          

         }

     }

     ajax.send("idconsulta="+nvalor);

 }






 function tucomentario(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/comentarios/form_respcomentario.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formnuevo").innerHTML = ajax.responseText;



         }

     }

     ajax.send("comentarios="+valor);

 }



function envioemailconsulta(valor){



 var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/boletin/enviaremailconsulta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

            //alert(ajax.responseText)

           

              $('#ventananuevo').modal('hide');

              mostrar_listado2(valor);
             

         }

     }

     ajax.send("respconsulta="+document.getElementById("respconsulta").value+"&idconsulta="+valor);





}



function verificar_nuevosmensajes(){






var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/inc_nav.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

            if(ajax.responseText!=0){



document.getElementById("nuevosmensajes").innerHTML=ajax.responseText;
//document.getElementById("usu").innerHTML=ajax.responseText;

//document.getElementById("f").innerHTML=ajax.responseText;



            }

           
            

             

         }
         }



     

     ajax.send("nmensajes="+document.getElementById("cantmensajes").value);









}







 function verpregunta(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/consultas/verpreguntacompleta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formnuevo").innerHTML = ajax.responseText;



         }

     }

     ajax.send("consulta="+valor);

 }

 function verrespuesta(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/consultas/verrespuestacompleta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formnuevo").innerHTML = ajax.responseText;



         }

     }

     ajax.send("respconsulta="+valor);

 }







 function marcarcorrecta(id,idpregunta){



  

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/preguntas/marcarcorrecta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

            

          mostrar_respuestas(idpregunta);



         }

     }

     ajax.send("id="+id+"&idpregunta="+idpregunta);











 }







  function tucomentario(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/comentarios/form_respcomentario.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             //alert(ajax.responseText)

           document.getElementById("formnuevo").innerHTML = ajax.responseText;



         }

     }

     ajax.send("comentarios="+valor);

 }





 function enviocomentario(valor){



 var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/comentarios/enviarcomentario.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

           

                         $('#ventananuevo').modal('hide');

              mostrar_listado2()

         }

     }

     ajax.send("respcomentario="+document.getElementById("respcomentario").value+"&idcomentario="+valor);





}



function actualizarcapitulo(){



 var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/preguntas/actualizarcapitulo.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

           

                        document.getElementById("campo1").innerHTML=ajax.responseText;

         }

     }

     ajax.send("idcurso="+document.getElementById("campo0").value);













}





 function validar(valor) {

    

     var campos = new Array()

     var columnas = document.getElementById("columnas").value

     var tabla = document.getElementById("tabla").value

     var col = columnas.split("|");

     for (x = 0; x < col.length; x++) {

         campos[x] = document.getElementById("campo" + x).value

     }

     var juntos = campos.join("|");

     if (campos[0] == "" || campos[1] == "") {

         alert("Complete todos los campos")

     } else {

        listarpreguntas(valor, juntos, columnas, tabla);

     }

 }



 



function editarpreguntas() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked == true) {

             chequeados++

             seleccionados += "|" + document.getElementById("check" + x).value

         }

     }

     if (chequeados > 1) {

         alert("Seleccione solo 1")

     } else if (chequeados == 0) {

         alert("Seleccione algun registro")

     } else {

         editandopreguntas(seleccionados)

     }

 }



  function editandopreguntas(valor) {

      $('#ventanaeditar').modal('show');

      document.getElementById("formnuevo").innerHTML = "";

     var tabla = document.getElementById("tabla").value;

     var columnas = document.getElementById("columnas").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/preguntas/editarpreguntas.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             //mostrar_listado();

             document.getElementById("formeditar").innerHTML = ajax.responseText;

         }

     }

     ajax.send("seleccionados=" + valor + "&tabla=" + tabla + "&columnas=" + columnas);

 }



  function listarpreguntas(valor, juntos, columnas, tabla) {

    

     var ajax = new XMLHttpRequest();

     

         ajax.open("post", "includes/modificar.php", true);

         var vmodal="#ventanaeditar"

     

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

               document.getElementById("buscar").value = "";

             

             $(vmodal).modal('hide');



           

          

             mostrar_listado2();

           

          

            

        

         }

     }

     ajax.send("seleccionados=" + valor + "&datos=" + juntos + "&columnas=" + columnas + "&tabla=" + tabla);

 }





 function validarpreguntas(valor) {

    

     var campos = new Array()

     var columnas = document.getElementById("columnas").value

     var tabla = document.getElementById("tabla").value

     var col = columnas.split("|");

     for (x = 0; x < col.length; x++) {

         campos[x] = document.getElementById("campo" + x).value

     }

     var juntos = campos.join("|");

     if (campos[0] == "" || campos[1] == "") {

         alert("Complete todos los campos")

     } else {

        store(valor, juntos, columnas, tabla);

     }

 }




 


 function validartareas() {
     var tarea=document.getElementById("tarea").value;
 var usuario=document.getElementById("usuario").value;
var fecha=document.getElementById("fecha").value;
     var ajax = new XMLHttpRequest();
     ajax.open("post", "includes/tareas/alta.php", true);
     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     ajax.onreadystatechange = function() {
         if (ajax.readyState == 4) {
             $('#ventananuevo').modal('hide');

          mostrar_listado2()

          

         }
     }
     ajax.send("tarea="+tarea+"&usuario="+usuario+"&fecha="+fecha);


 }







function altacomentariost(id) {

     $('#ventananuevo').modal('show');

     document.getElementById("formeditar").innerHTML = "";

    

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/comentariost/form_alta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formnuevo").innerHTML = ajax.responseText;

         }

     }

     ajax.send("id="+id);

 }




  function validarcomentariost() {
     var usuario=document.getElementById('usuario').value
 var idtarea=document.getElementById('idtarea').value
 var comentario=document.getElementById('realizarc').value
 
     var ajax = new XMLHttpRequest();
     ajax.open("post", "includes/comentariost/alta.php", true);
     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     ajax.onreadystatechange = function() {
         if (ajax.readyState == 4) {
            

       
altacomentariost(idtarea)
          

         }
     }
     ajax.send("usuario="+usuario+"&idtarea="+idtarea+"&realizarc="+comentario);


 }



 function editandotareas(valor) {
     var usuario=document.getElementById('usuario').value
 var tarea=document.getElementById('tarea').value
var fecha=document.getElementById('fecha').value
     var ajax = new XMLHttpRequest();
     ajax.open("post", "includes/tareas/editandotareas.php", true);
     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     ajax.onreadystatechange = function() {
         if (ajax.readyState == 4) {
               $('#ventanaeditar').modal('hide');

       
mostrar_listado2(valor)
          

         }
     }
     ajax.send("usuario="+usuario+"&tarea="+tarea+"&valor="+valor+"&fecha="+fecha);


 }



 
 function cambiarestadoi(valor) {
     

     var ajax = new XMLHttpRequest();
     ajax.open("post", "includes/tareas/cambiarestadoai.php", true);
     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     ajax.onreadystatechange = function() {
         if (ajax.readyState == 4) {
               
mostrar_listado2(valor)
       

          

         }
     }
     ajax.send("valor="+valor);


 }
  function cambiarestadof(valor) {
     

     var ajax = new XMLHttpRequest();
     ajax.open("post", "includes/tareas/cambiarestadoaf.php", true);
     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     ajax.onreadystatechange = function() {
         if (ajax.readyState == 4) {
               

       mostrar_listado2(valor)

          

         }
     }
     ajax.send("valor="+valor);


 }



  function cambiarestadoa(valor) {
     

     var ajax = new XMLHttpRequest();
     ajax.open("post", "includes/tareas/cambiarestadoaa.php", true);
     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     ajax.onreadystatechange = function() {
         if (ajax.readyState == 4) {
               

       
mostrar_listado2(valor)
          

         }
     }
     ajax.send("valor="+valor);


 }

function cambiarestadop(valor) {
     

     var ajax = new XMLHttpRequest();
     ajax.open("post", "includes/tareas/cambiarestadoap.php", true);
     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     ajax.onreadystatechange = function() {
         if (ajax.readyState == 4) {
               

       
mostrar_listado2(valor)
          

         }
     }
     ajax.send("valor="+valor);


 }





function editarusuario() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked == true) {

             chequeados++

             seleccionados +=  document.getElementById("check" + x).value

         }

     }

     if (chequeados > 1) {

         alert("Seleccione solo 1")

     } else if (chequeados == 0) {

         alert("Seleccione algun registro")

     } else {

//alert(seleccionados)
         location.href="editaru.php?usuario="+seleccionados

     }

 }


function editaralumnos() {

     var chequeados = 0

     var seleccionados = ""

     var filas = verifica_paso();

     for (x = 1; x <= filas; x++) {

         if (document.getElementById("check" + x).checked == true) {

             chequeados++

             seleccionados +=  document.getElementById("check" + x).value

         }

     }

     if (chequeados > 1) {

         alert("Seleccione solo 1")

     } else if (chequeados == 0) {

         alert("Seleccione algun registro")

     } else {

//alert(seleccionados)
         location.href="editaralumnos.php?alumno="+seleccionados

     }

 }




 function verificarcorreos(){
var mail=document.getElementById("correo").value;




    
   
var ajax = new XMLHttpRequest(); 
    ajax.open("post", "buscarmail.php", true); 
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4){
            
       
        if(ajax.responseText==1){
       
alert("enviamos un email a su casilla de correo para restablecer la contraseña")


    }else{


alert("ese email no se encuantra en nuestra base de datos")

    }
          


       
      
        }
        
    }
 
    
    ajax.send("correo="+mail);
    
    }   


    function modificarc(){
var mail=document.getElementById("correo").value;
var contra=document.getElementById("contrasena").value;
var usuario=document.getElementById("usuario").value;


    
   
var ajax = new XMLHttpRequest(); 
    ajax.open("post", "restablecerc.php", true); 
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4){
            
       
      
          
alert("Has cambiado tu contraseña ingresa nuevamente a tu cuenta");


        location.href="http://www.institutobrienza.com.ar/brienza_14567!/index.php"
      
        }
        
    }
 
    
    ajax.send("correo="+mail+"&contrasena="+contra+"&usuario="+usuario);
    
    }  



    function registrousuario() {
    var nombre = document.getElementById("usuario").value;
  
    var correo = document.getElementById("email").value;
   
    var contrasena1 = document.getElementById("contrasena").value;
    var contrasena2 = document.getElementById("contrasena1").value;
    var expreg = /^\w+([\.-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,64})+$/;



    if (nombre == "") {

       alert("escriba usuario");



     




    }  else if (correo == "") {


         alert("Complete correo");




    } else if (!expreg.test(correo)) {

        

 alert("Correo invalido");


    }  else if (contrasena1 == "" || contrasena2 == "") {

       
       

alert("Debe completar las contraseñas");



    } else if (contrasena1 != contrasena2) {

      
   alert("las contraseñas no coinciden");

    } else {





        var ajax = new XMLHttpRequest();
        ajax.open("post", "procesoddatos.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4) {

if(ajax.responseText==0){

alert("su registro se realizo con exito le hemos enviado un email para confirmar su registro")
       
  location.href="http://www.institutobrienza.com.ar/brienza_14567!/index.php"   

}



else{verificaemail();




}

 
            }
        }
        ajax.send("usuario=" + nombre +"&email=" + correo +"&contrasena=" + contrasena1);



    }
}

function verificaemail(valor) {
    var emailr = document.getElementById("email").value;
    var expreg = /^\w+([\.-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,64})+$/;


    if (!expreg.test(emailr)) {

        
alert("Correo invalido")


        
    } else {
        var ajax = new XMLHttpRequest();
        ajax.open("post", "verificaemail.php", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4) {



                if (ajax.responseText == 0) {

                    //escribo el tilde verde

                    alert("Este email no esta en nuestra base de datos")

                } else { 

                  alert("Este email ya esta en nuestra base de datos")
                    
                }


            }
        }
        ajax.send("usuario=" + emailr);


    }

} 

function vercalendario(){
    var fecha=new Date();
    //escribo en los campos ocultos año actual y mes actual 
    
    document.getElementById("anooculto").value=fecha.getFullYear()
    document.getElementById("mesoculto").value=fecha.getMonth()

document.getElementById('calendario').style.display="block"
calendario()

}





    function adelante1(){
    var anoculto=document.getElementById("anooculto")
    var meso=document.getElementById("mesoculto")
    
    
    if(meso.value<11){meso.value=parseInt(meso.value)+1}
    else{meso.value=0
    anooculto.value=parseInt(anooculto.value)+1
    }
    
    
   
     calendario()
    
    }
    function atras1(){
    var anoculto=document.getElementById("anooculto")
    var meso=document.getElementById("mesoculto")
    
    
    if(meso.value>0){meso.value=parseInt(meso.value)-1}
    else{meso.value=11
    anooculto.value=parseInt(anooculto.value)-1
    }
    
    

     calendario()
    
    }




function ver1(fecha){

document.getElementById('fecha').value=fecha;

  document.getElementById("calendario").style.display="none"


}



function calendario(){


    
    
//escribo la cuadricula vacia   
var cuadricula="<div id='atras' class='atras' onclick='atras1()'><</div> <div id='nombremes'></div><div id='adelante' class='adelante'  onclick='adelante1()'>></div><div id='clear'></div>";
for(x=1;x<50;x++){
    cuadricula=cuadricula+"<div id='celda"+x+"'></div>"

    }
    //escribo en div calendario la cuadricula generada anteriormente
    document.getElementById("calendario").innerHTML=cuadricula
    
    //escribo en los priemros 7 cuadritos los dias de la semana
    var dias=new Array("DO","LU","MA","MI","JU","VI","SA")
    for(x=1;x<8;x++){
    document.getElementById("celda"+x).innerHTML=dias[x-1]
    }
    var mesactual=document.getElementById("mesoculto").value
    var anoactual=document.getElementById("anooculto").value
    if(anoactual%4==0&&anoactual%100!=0||anoactual%400==0){var bi=29}
    else{var bi=28}
    //determino la cantidad de dias que tiene todos los meses del año
    var cantdias=new Array(31,bi,31,30,31,30,31,31,30,31,30,31)
    var nombremes=new Array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre")
    

    
    //escribo el nombre del mes actual
    document.getElementById("nombremes").innerHTML=nombremes[mesactual]+" "+ anoactual
    
    //obtengo el primer dia del mes actual
    var primerdia=new Date(anoactual,mesactual,1)
    
    //obtengo el dia de la semana del mes actual
    var primero=primerdia.getDay()

var campo=parseInt(mesactual)+parseInt(1)
 

    //escribo en la cuadricula los numeros de los dias del mes actual
    for(x=1;x<cantdias[mesactual]+1;x++){
   
        document.getElementById("celda"+(x+7+primero)).innerHTML="<b onclick=\"ver1('"+anoactual+"-"+campo+"-"+x+"')\">"+x+"</b>"
       


        }



        //onClick="ver("+anoactual+'-'+ mesactual+'-'+x")"//
    //document.getElementById("cb"+b).innerHTML="<span onclick=\"agendardia("+x+",'"+campo+"')\" id='sb"+x+"' >"+x+"</span>"; 
    //complete los primeros dias del mes siguiente
    for(x=1;x<50-(7+primero+cantdias[mesactual]);x++){
        //posicionms es:7 para los nombre de los dias dela semana
        //primero es el dia de la semana del primer dia del mes (0 a 6)
        //cantdias[mesactual] es la cantidad de dias del mes actual que sale del del array cantdias
        var posicionms=7+primero+cantdias[mesactual]+x
        document.getElementById("celda"+posicionms).innerHTML=x
        }
    //complete los ultimos dias del mes anterior
    var cantdiasma=cantdias[mesactual-1]
    for(x=1;x<primero+1;x++){
        //cantdiama es la cantidad de dia del mes anterior que sale de restar 1 a mes actual
        document.getElementById("celda"+(7+x)).innerHTML=cantdiasma-primero+x
        }
        //resaltamos el dia actual  
        var fecha=new Date()
        var diaactual=fecha.getDate()
  
 
        //date es el numero del dia y day es el dia de la semana
        document.getElementById("celda"+(7+primero+diaactual)).className="diaactual"

 
 
}





function cargalocalidad(){



  

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/regalumnos/localidad.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             

             document.getElementById("localidad").innerHTML=ajax.responseText;

              document.getElementById("localidad").disabled=false;

         }

     }

     ajax.send("idprovincia="+document.getElementById("provincia").value);











 }




 function validaralum(valor) {

    

     completarfecha();

         document.getElementById("miFormulario").submit()

     

 }
  function editandoalum(valor) {

    


         document.getElementById("miFormulario").submit()

     

 }



 function veralumno(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/regalumnos/verdatosalumnos.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formnuevo").innerHTML = ajax.responseText;


              


         }

     }

     ajax.send("idalumno="+valor);

 }


function altacaja() {

 
if($('input:radio[name=tipo]:checked').val()=="egreso"){
var salida=$("#valor").val()
var entrada=0;

   }else{

var entrada=$("#valor").val()
var salida=0;

   }

    $.ajax({

        type: "POST",
        data: {
            fecha:$("#fecha").val(),
            descripcion: $("#descripcion").val(),
            salida: salida,
            entrada: entrada
          
        },
        url: "includes/" + $("#tabla").val() + "/altacaja.php",
        success: function(result) {
            console.log(result)
            $('#ventananuevo').modal('hide');
            mostrar_listado2()
            actualizarsaldo()

        }

    });

}
function actualizarsaldo() {

 

    $.ajax({

       
        url: "includes/caja/saldo.php",
        success: function(result) {
           
            $('#saldocaja').val(result);
       

        }

    });

}



 function asistente_busquedaporalumno() {
   
     if (document.getElementById("listadoalumnos").style.display == "block") {

       



         var ajax = new XMLHttpRequest();

         ajax.open("post", "includes/relcursosalumnos/asistentealumnos.php", true);

         ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         ajax.onreadystatechange = function() {

             if (ajax.readyState == 4) {

                 document.getElementById("listadoalumnos").innerHTML = ajax.responseText;

             }

         }

         ajax.send("buscaralumno="+document.getElementById('buscaralumno').value);

     } else {

         document.getElementById("listadoalumnos").style.display = "block";

     }

 }




 function vercursosalumnos(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/relcursosalumnos/vercursosalumnos.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {
document.getElementById("listadoalumnos").style.display="none";
             document.getElementById("veralumno").innerHTML = ajax.responseText;
document.getElementById("buscaralumno").value="";

              


         }

     }

     ajax.send("alumno="+valor);

 }


  function mostracurso(valor,idalumno) {

     

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/relcursosalumnos/agregarcurso.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {
document.getElementById("datos").style.display="block";
             document.getElementById("datos").innerHTML = ajax.responseText;


        


         }

     }

     ajax.send("idcurso="+valor+"&idalumno="+idalumno);

 }




  






  function vercuenta(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/cuentacorriente/form_altan.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {


              


         }

     }

     ajax.send("alumno="+valor);

 }




 function agregargrupo(){
var nombres=document.getElementById('nombre').value;
var cursos=document.getElementById('curso').value;
var hi=document.getElementById('hi').value;
var hf=document.getElementById('hf').value;



var  lu=($('#lu').is(':checked'))?1:0
var  ma=($('#ma').is(':checked'))?1:0
var  mie=($('#mie').is(':checked'))?1:0
var  jue=($('#jue').is(':checked'))?1:0
var  vie=($('#vie').is(':checked'))?1:0
var  sab=($('#sab').is(':checked'))?1:0













var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/grupo/altagrupo.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

              $('#ventananuevo').modal('hide');
            mostrar_listado2();

         }

     }

     ajax.send("curso="+cursos+"&hi="+hi+"&hf="+hf+"&lu="+lu+"&ma="+ma+"&mie="+mie+"&jue="+jue+"&vie="+vie+"&sab="+sab+"&nombre="+nombres);





}




 function agregarinscriptos(){
var grupo=document.getElementById('grupo').value;
var cursos=document.getElementById('curso').value;

















var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/relalumnosgrupos/inscriptos.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

          document.getElementById("inscriptos").innerHTML = ajax.responseText;
 

         }

     }

     ajax.send("curso="+cursos+"&grupo="+grupo);





}




function asistente_busquedaporalumnos() {
   
     if (document.getElementById("listadoalumnos").style.display == "block") {

       



         var ajax = new XMLHttpRequest();

         ajax.open("post", "includes/relalumnosgrupos/asistentealumnos.php", true);

         ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         ajax.onreadystatechange = function() {

             if (ajax.readyState == 4) {

                 document.getElementById("listadoalumnos").innerHTML = ajax.responseText;

             }

         }

         ajax.send("buscaralumno="+document.getElementById('buscaralumno').value);

     } else {

         document.getElementById("listadoalumnos").style.display = "block";

     }

 }


  function vercursosalumnos(valor) {

     $('#ventananuevo').modal('show');

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/relalumnosgrupos/vercursosalumnos.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {
document.getElementById("listadoalumnos").style.display="none";
document.getElementById("datos").style.display ="block";
             document.getElementById("datos").innerHTML = ajax.responseText;
document.getElementById("buscaralumno").value="";

              


         }

     }

     ajax.send("alumno="+valor);

 }






function insertarcurso() {

     var numcurso=document.getElementById('numcurso').value;
     var numalumno=document.getElementById('numalumno').value;
var numgrupo=document.getElementById('numgrupo').value;
     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/relalumnosgrupos/inscripcion.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

           if(ajax.responseText==1){
            document.getElementById("textrespuesta").innerHTML ="<b>Esta persona ya se encuentra inscripta en este grupo</b>"
document.getElementById("datos").style.display="none";

}else{

 document.getElementById("listalu").innerHTML=ajax.responseText;
document.getElementById("datos").style.display="none";
}



         }

     }

     ajax.send("numcurso="+numcurso+"&numalumno="+numalumno+"&numgrupo="+numgrupo)

 }

function borraralumnog(alum) {

     

   

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/relalumnosgrupos/borraralumnosg.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

    document.getElementById("list"+alum).innerHTML =ajax.responseText;

         }

     }

     ajax.send("idalu="+alum)

 }




 function cargargrupo(){



  

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/relalumnosgrupos/grupos.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             

             document.getElementById("grupo").innerHTML=ajax.responseText;

              document.getElementById("grupo").disabled=false;

         }

     }

     ajax.send("idcurso="+document.getElementById("curso").value);











 }





function asistente_busquedadealumnos() {
   
     if (document.getElementById("listadoalumno").style.display == "block") {

       



         var ajax = new XMLHttpRequest();

         ajax.open("post", "includes/cuentacorriente/asistentealumnos.php", true);

         ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         ajax.onreadystatechange = function() {

             if (ajax.readyState == 4) {

                 document.getElementById("listadoalumno").innerHTML = ajax.responseText;

             }

         }

         ajax.send("buscaralumno="+document.getElementById('buscaralumno').value);

     } else {

         document.getElementById("listadoalumno").style.display = "block";

     }

 }





 function vercuentacorriente(idalumno) {

     
             

            location.href="cuentacorriente.php?idalumno="+idalumno

        

     
muestra(idalumno)
     




         


    

 }




 function nuevacuentacorrientealumno(idalum) {

     $('#ventanaeditar').modal('show');

     document.getElementById("formnuevo").innerHTML = "";

     var tabla = document.getElementById("tabla").value;

     var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/"+tabla+"/form_altan.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formeditar").innerHTML = ajax.responseText;

         }

     }

     ajax.send("idalum="+idalum);

 }


function altacuentacorriente() {

 
if($('input:radio[name=tipo]:checked').val()=="debe"){
var debe=$("#valor").val()
var haber=0;

   }else{

var haber=$("#valor").val()
var debe=0;

   }

    $.ajax({

        type: "POST",
        data: {
            fecha:$("#fecha").val(),
            concepto: $("#concepto").val(),
            idalumno:$("#idalumno").val(),
            debe:debe,
            haber:haber
            
          
        },
        url: "includes/cuentacorriente/altacuentacorriente.php",
        success: function(result) {
           
            $('#ventanaeditar').modal('hide');
            muestra()
            //actualizarsaldo()

        }

    });

}


function muestra() {

     
     var idalumno=document.getElementById('idalumno').value;
       

       

         var ajax = new XMLHttpRequest();

         ajax.open("post", "includes/cuentacorriente/abm.php", true);

         ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         ajax.onreadystatechange = function() {

             if (ajax.readyState == 4) {



                document.getElementById("filas").innerHTML = ajax.responseText;

                 

                

             }

         }

         ajax.send("idalumno="+idalumno);

  

 }




  


function altasistencia(){
   
$('.radioasistencia input[type=radio]').each(function(){

if($(this).prop('checked')){


 var ausente=0;
 var presente=1
  
}else{

 var ausente=1;
 var presente=0

}

 $.ajax({

        type: "POST",
        data: {
             fecha:$("#fecha").val(),
            ausente:ausente,
            presente:presente,
            numeralumno:$("#numeroalumno").val()
           
            
          
        },
        url: "includes/relalumnosgrupos/insertarasistencia.php",
        success: function(result) {
          console.log(result) 
            //$('#ventanaeditar').modal('hide');
         
            //actualizarsaldo()

        }

    });
});




} 