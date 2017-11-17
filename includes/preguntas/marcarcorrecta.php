<?
include("../inc_conectoresi.php");
//esto pone en cero todas las respuestas
$sql="UPDATE respuestas set correcta=0 where idpregunta=".$_POST['idpregunta'];
mysqli_query($con,$sql);  
//esto marca la respuesta correcta
$sql1="UPDATE respuestas set correcta=1 where id=".$_POST['id'];
mysqli_query($con,$sql1);  
mysqli_close($con);


?>