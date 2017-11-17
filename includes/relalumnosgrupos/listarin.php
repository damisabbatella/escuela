<?php include("../../includes/inc_conectoresi.php");
	//este es el id del grupo
   $idgrupo=$_POST["idgrupo"];
    $idcurso=$_POST["curso"];
    $sqla="SELECT * 
    from relalumnosgrupos where idgrupo=".$idgrupo;
    $resultadoa=mysqli_query($con,$sqla);
   while($fila=mysqli_fetch_assoc($resultadoa)){
    ?>
          
             
                    <li class="list-group-item" id="list<?=$fila["grupo"]?>"><?=$fila["nombre"]?><button class="btn btn-danger" onclick="borraralumnog(<?=$fila["grupo"]?>)">eliminar</button></li>
                  
                 <?}




