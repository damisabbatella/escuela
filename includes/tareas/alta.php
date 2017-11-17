<?
include("../../includes/inc_conectoresi.php");
$usuario=$_POST["usuario"];
$tarea=$_POST["tarea"];
$fecha=$_POST["fecha"];

$sql="INSERT into tareas (nombre,idadmin,fechavenc,estado,status)value('".$tarea."','".$usuario."','".$fecha."',0,1)";
mysqli_query($con,$sql);
 

?>