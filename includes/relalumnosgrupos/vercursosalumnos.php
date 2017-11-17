<?include("../../includes/inc_conectoresi.php");?>

<div class="modal-body ">
  
   



 <div id="page-wrapper">
            <div class="container-fluid">


                <!-- Page Heading -->
                <?
                $sql="SELECT * from regalumnos where id=".$_POST["alumno"];
    $resultado=mysqli_query($con,$sql);
    $alumno=mysqli_fetch_assoc($resultado)

    ?>
         <div class="col-md-10 insc" id="datos">
<div class="col-md-4">
 <?

$imagen=($alumno["fotoperfil"]!="")?$alumno["fotoperfil"]:"sinimagen.jpg";
?>




<img  class="img-thumbnail" src="fotos/portfolio/<?php echo $imagen ?>"/>


</div><br>

<span><h3><?=$alumno["nombre"]?></h3></span>
<span><h3><?=$alumno["apellido"]?></h3></span><br>
<input type="hidden" id="numalumno" value="<?=$alumno["id"]?>">


 
<button class="btn btn-info btn-lg" onClick="insertarcurso()">inscribir</button><br>

  


         






               
                  


</div>       <!-- /.row -->
                
            </div>
            <!-- /.row -->
            
            
        </div>
        <!-- /.container-fluid -->

</div>


    </div>



  