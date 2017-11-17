<?
include("../../includes/inc_conectoresi.php");
$tarea=$_POST["tarea"];
$usuario=$_POST["usuario"];
$fecha=$_POST["fecha"];
$sql="update tareas set nombre='".$tarea."',idadmin='".$usuario."',fechavenc='".$fecha."' where id=".$_POST["valor"];
mysqli_query($con,$sql);

//echo $sql;





?>