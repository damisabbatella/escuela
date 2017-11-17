<?php include("../../includes/inc_conectoresi.php");?>


  
   




            
                <!-- Page Heading -->
            <?php
$sql1="SELECT * from cursos where id=".$_POST["idcurso"];
$resultado1=mysqli_query($con,$sql1);
$fila=mysqli_fetch_assoc($resultado1);



            ?>    
<span><h1><?=$fila["curso"]?></h1></span>

<?php
     
$sql2="SELECT * from regalumnos where id=".$_POST["idalumno"];
    $resultado2=mysqli_query($con,$sql2);
    $filaalumno=mysqli_fetch_assoc($resultado2);
?>
<div class="col-md-4">
 <?

$imagen=($filaalumno["fotoperfil"]!="")?$filaalumno["fotoperfil"]:"sinimagen.jpg";
?>




<img  class="img-thumbnail" src="fotos/portfolio/<?php echo $imagen ?>"/>


</div><br>

<span><h3><?=$filaalumno["nombre"]?></h3></span>
<span><h3><?=$filaalumno["apellido"]?></h3></span><br>
<input type="hidden" id="numalumno" value="<?=$filaalumno["id"]?>">
<input type="hidden" id="numcurso" value="<?=$fila["id"]?>">

 
<button class="btn btn-info btn-lg" onClick="insertarcurso()">inscribir</button><br>

  <br><div class="col-md-12" id="textoinsc"></div> 



  