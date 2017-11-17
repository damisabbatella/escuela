<?php
include("../inc_conectoresi.php");

$sql="SELECT * from localidades where idprovincia=".$_POST["idprov"];
$resultado=mysqli_query($con,$sql);
while($fila=mysqli_fetch_assoc($resultado)){
?>
<option value="<?=$fila["id"]?>"><?=$fila["localidad"]?></option>



<?
}





?>