<?
include("../../includes/inc_conectoresi.php");


$sql="update tareas set estado=0 where id=".$_POST["valor"];
mysqli_query($con,$sql);

//echo $sql;





?>