<?php include("../../includes/inc_conectoresi.php");
$sql1="SELECT * from relalumnosgrupos where idalumno=".$_POST["numalumno"];
$resultado1=mysqli_query($con,$sql1);

if(mysqli_num_rows($resultado1)==0){



$sql = "INSERT INTO relalumnosgrupos(idalumno,idcurso,idgrupo,status) values ('".$_POST["numalumno"]."','".$_POST["numcurso"]."','".$_POST["numgrupo"]."',1)";
mysqli_query($con,$sql);



    $sqla="SELECT a.id grupo,a.idgrupo,a.idcurso,a.idalumno,a.status,b.id idreg,b.nombre,c.id from relalumnosgrupos a,regalumnos b,grupo c where a.status=1 and c.id=a.idgrupo and  b.id=a.idalumno";
    $resultadoa=mysqli_query($con,$sqla);
   while($fila=mysqli_fetch_assoc($resultadoa)){
    ?>
          
             
                    <li class="list-group-item" id="list<?=$fila["grupo"]?>"><?=$fila["nombre"]?>&nbsp; &nbsp;<button class="btn btn-danger" onclick="borraralumnog(<?=$fila["grupo"]?>)">eliminar</button></li>
                  
                 <?}
}else{

echo 1;

}



                 ?>








