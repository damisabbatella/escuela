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
                <!-- /.row -->
                
            </div>
            <!-- /.row -->
            <ul class="list-group col-md-4">
            
          <?

    $sql="SELECT * from cursos where status=1";
    $resultado=mysqli_query($con,$sql);
   while($fila=mysqli_fetch_assoc($resultado)){
    ?>
          
             
                     <li class="list-group-item" onclick="mostracurso(<?=$fila["id"]?>,<?=$alumno["id"]?>)"><button class="btn btn-info btn-lg"><?=$fila["curso"] ?></button></li>
                  <input type="hidden" id="idcurso" value="<?=$fila["id"]?>">
                 <?}
?>





<input type="hidden" id="idalumno" value="<?=$alumno["id"]?>">

               
                  
                      </ul>
            
        </div>
        <!-- /.container-fluid -->
<div class="col-md-7 insc" id="datos" style="display:none">


</div>
</div>


    </div>



  