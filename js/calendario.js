window.onload=function(){
    var fecha=new Date()
    //escribo en los campos ocultos año actual y mes actual 
    document.getElementById("anooculto").value=fecha.getFullYear()
    document.getElementById("mesoculto").value=fecha.getMonth()
   calendario();
    }
function calendario(){
    
//escribo la cuadricula vacia   
var cuadricula="<div id='atras' onclick='atras()'><</div> <div id='nombremes'></div><div id='adelante' onclick='adelante()'>></div><div id='clear'></div>";
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
    
    //escribo en la cuadricula los numeros de los dias del mes actual
    for(x=1;x<cantdias[mesactual]+1;x++){
        document.getElementById("celda"+(x+7+primero)).innerHTML="<b>"+x+"</b>"
        
        }
    
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
        var diaactual=fecha.getDate()//date es el numero del dia y day es el dia de la semana
        document.getElementById("celda"+(7+primero+diaactual)).className="diaactual"
        
}
function adelante(){
    var anoculto=document.getElementById("anooculto")
    var meso=document.getElementById("mesoculto")
    
    
    if(meso.value<11){meso.value=parseInt(meso.value)+1}
    else{meso.value=0
    anooculto.value=parseInt(anooculto.value)+1
    }
    
    
    calendario()
    
    }
    function atras(){
    var anoculto=document.getElementById("anooculto")
    var meso=document.getElementById("mesoculto")
    
    
    if(meso.value>0){meso.value=parseInt(meso.value)-1}
    else{meso.value=11
    anooculto.value=parseInt(anooculto.value)-1
    }
    
    
    calendario()
    
    }
