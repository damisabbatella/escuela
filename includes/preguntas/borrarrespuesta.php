<?
include("../inc_conectoresi.php");


$sql="delete from respuestas where id=".$_POST["id"];
mysqli_query($con,$sql);




?>