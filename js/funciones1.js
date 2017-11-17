//Listener del onLoad
 window.onload = function() {
   

      if(document.getElementById("mostrarlistado").value==1){

     mostrar_listado();



     //verifica cada un minuto (60000) si hay nuevos mensajes



     

     

     

  }else if (document.getElementById("mostrarlistado").value==2) {

       mostrar_listado2();


  }

   setInterval("verificar_nuevosmensajes()",8000);

 }

 document.onclick = clickEnDoc;



 function clickEnDoc(e) {

    if (document.getElementById('asistente').style.display == "block"); {

         document.getElementById('asistente').style.display = "none";

       document.getElementById('asistente').innerHTML = "";

     }

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

    

     var campos = new Array()

     var columnas = document.getElementById("columnas").value

     var tabla = document.getElementById("tabla").value

     var col = columnas.split("|");
          
 var expreg = /^\w+([\.-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,64})+$/;

     if (document.getElementById("campo0").value == "" || document.getElementById("campo1").value == ""|| document.getElementById("campo2").value == "") {

         alert("Complete todos los campos")

     }else if (document.getElementById("campo2").value!=document.getElementById("campo2a").value){
          alert("Las contraseñas no coinciden")
     } else if (!expreg.test(document.getElementById("campo1").value)) {



        alert("email invalido")



    }

     else {
         campos[0] = document.getElementById("campo0").value
         campos[1] = document.getElementById("campo1").value
         campos[2] = md5(document.getElementById("campo2").value)
         var juntos = campos.join("|");
       store(valor, juntos, columnas, tabla);

     }

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



           if(document.getElementById("mostrarlistado").value==2){

             mostrar_listado2();

           }else if (document.getElementById("mostrarlistado").value==1) {

               mostrar_listado();

           }

            

        

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



 function filtrar(valor) {

     document.getElementById("buscar").value = valor;

     if(document.getElementById("mostrarlistado").value==1){

     mostrar_listado();

 }else if(document.getElementById("mostrarlistado").value==2){



mostrar_listado2();



 }

 }



 function mostrar_listado() {

     var tabla = document.getElementById("tabla").value;

     

         var paso = document.getElementById("paso").value;

         var pagina = document.getElementById("pagina").value;

         var columnas = document.getElementById("columnas").value;

         var clave = document.getElementById("buscar").value;

         

        var filtro=(document.getElementById("filtracurso").value)?document.getElementById("filtracurso").value:"";

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

         ajax.send("paso=" + paso + "&pagina=" + pagina + "&tabla=" + tabla + "&columnas=" + columnas + "&clave=" + clave+ "&filtro=" + filtro);

    

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



//alert(ajax.responseText)

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

    

 }



 function cambio_paso() {

     document.getElementById("paso").value = document.getElementById("selector").value;

     document.getElementById("pagina").value = 1;

     mostrar_listado();

 }



 function avanzar() {

     document.getElementById("atras").disabled = false;

     document.getElementById("pagina").value = parseInt(document.getElementById("pagina").value) + 1;

     mostrar_listado();

 }



 function atras() {

     if (document.getElementById("pagina").value > 1) {

         document.getElementById("pagina").value = parseInt(document.getElementById("pagina").value) - 1;

     }

     mostrar_listado();

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

     ajax.open("post", "includes/consultas/form_respconsulta.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

             document.getElementById("formnuevo").innerHTML = ajax.responseText;


              
mostrar_listado2(valor);
         }

     }

     ajax.send("consulta="+valor);

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

     ajax.open("post", "includes/consultas/enviaremailconsulta.php", true);

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

 if (document.getElementById("mostrarlistado").value==0) {

      editarcurso();

  }else if(document.getElementById("mostrarlistado").value==3){

editarleccion();



  }


  else{

var ajax = new XMLHttpRequest();

     ajax.open("post", "includes/inc_nav.php", true);

     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     ajax.onreadystatechange = function() {

         if (ajax.readyState == 4) {

            if(ajax.responseText!=0){



document.getElementById("nuevosmensajes").innerHTML=ajax.responseText;
document.getElementById("nuevomensajes").innerHTML=ajax.responseText;





            }

           
            

             

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
 