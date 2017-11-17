<?php
include("../includes/inc_conectoresi.php");
$sel=$_POST["seleccionados"];
$tabla=$_POST["tabla"];
$registros=explode("|", $sel);





	//borrado logico general
for($x=0;$x<count($registros)-1;$x++){
	$sql="update $tabla set status=2 where id=".$registros[$x+1];
	mysqli_query($con,$sql);
	
}
mysqli_close($con);
?>