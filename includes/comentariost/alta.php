<?
session_start();
include("../../includes/inc_conectoresi.php");
date_default_timezone_set("America/Argentina/Buenos_Aires");
$time=time();
$fecha=date("Y-m-d",$time);
$hora= date("H:i",$time);

$sql="INSERT into comentariost (idtarea,fecha,hora,pregunta,admin,status)value('".$_POST["idtarea"]."','".$fecha."','".$hora."','".$_POST["realizarc"]."','".$_SESSION["usuario"]."',1)";
mysqli_query($con,$sql);
 

?>