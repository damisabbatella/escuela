<?
include("inc_conectoresi.php");
$email=$_POST["usuario"];

$sql="select * from usuarios where email='$email'";
$resultado=mysql_query($sql);
if(mysql_num_rows($resultado)==0){


echo 0;





}else{echo 1;}






?>