<?php
 session_start();
include("../../includes/inc_conectoresi.php");

$usuario=$_POST["datos0"];
$email=$_POST["datos1"];
$contrasena=$_POST["datos2"];




if($contrasena==""){

$sql="update usuarios set admin='".$usuario."', email='".$email."' where id=".$_GET["id"];

}else{

$sql="update usuarios set admin='".$usuario."', email='".$email."',contrasena='".md5($contrasena)."' where id=".$_GET["id"];



}
 $_SESSION['admin']=$usuario;
mysqli_query($con,$sql);
header("location:../../usuarios.php")
?>


