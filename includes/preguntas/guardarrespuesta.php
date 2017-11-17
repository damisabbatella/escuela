<?
include("../inc_conectoresi.php");
$idpregunta=$_POST["idpregunta"];
$textor=$_POST["textor"];

$sql="insert into respuestas (idpregunta,texto) values ($idpregunta,'$textor')";
mysqli_query($con,$sql);

//echo $sql;





?>