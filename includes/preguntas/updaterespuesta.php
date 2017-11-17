<?
include("../inc_conectoresi.php");
$idtexto=$_POST["idtexto"];
$textor=$_POST["textor"];

$sql="update respuestas set texto='$textor' where id=$idtexto";
mysqli_query($con,$sql);

//echo $sql;





?>