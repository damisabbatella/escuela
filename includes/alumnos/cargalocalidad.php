<?php
include("../../includes/inc_conectoresi.php");

$sql="SELECT * from localidades where idprovincia=".$_POST["idprovincia"];
$resultado=mysqli_query($con,$sql);
while($fila=mysqli_fetch_assoc($resultado)){
?>
<option value="<? echo $fila["id"]?>"><? echo $fila["localidad"]?></option>



<?
}





?>