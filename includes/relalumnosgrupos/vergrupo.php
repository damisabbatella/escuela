<?php
include("../../includes/inc_conectoresi.php");
    $sql="SELECT * from relalumnosgrupos where idgrupo=".$_POST["num"];
    $resultadoa=mysqli_query($con,$sql);
   while($fila=mysqli_fetch_assoc($resultadoa)){
    ?>
          
             
                     <span><?=$fila["idalumno"] ?></span>
                  
                 <?}
?>


    