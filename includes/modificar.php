<?php
include("../includes/inc_conectoresi.php");

	   $col = explode("|",$_POST["columnas"]);
       $tabla = $_POST["tabla"];
       $datos = explode("|", $_POST["datos"]);
      
//SI LA TABLA ES usuarios Y LA CONTRASEÑA ESTA VACIA NO MODIFICO EL CAMPO CONTRASEÑA
if($tabla=="usuarios"){

  if($datos[2]==""){//no cambia la conrtraseña
$sql="UPDATE $tabla SET $col[0]='" . $datos[0] . "',$col[1]='" . $datos[1] . "',$col[2]='" . $datos[2] . "',$col[3]='" . $datos[3] . "' where id=" . $_POST['seleccionados'];
}else{
//cambia la contraseña con md5
 $sql="UPDATE $tabla SET $col[0]='" . $datos[0] . "',$col[1]='" . $datos[1] . "',$col[2]='" . md5($datos[2]) . "',$col[3]='" . $datos[3] . "' where id=" . $_POST['seleccionados'];
 


}
}else{
 
       $sql = "UPDATE $tabla SET $col[0]='" . $datos[0] . "'";
       for ($i = 1; $i < count($col); $i++) {
           $sql .= ", $col[$i]='" . $datos[$i] . "'";
       }
       $sql .= "where id=" . $_POST['seleccionados'];
 
    
}

  mysqli_query($con,$sql);
mysqli_close($con);
?>