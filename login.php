<?php
session_start(); 
include("includes/inc_conectoresi.php");
$contrasena=md5($_POST["contrasena"]);

$sql="select * FROM usuarios  where admin='".$_POST["usuario"]."' and contrasena='$contrasena' or email='".$_POST["usuario"]."' and contrasena='$contrasena'";

	$result=mysqli_query($con,$sql); 

if(mysqli_num_rows($result)==1){
	$fila = mysqli_fetch_array($result);
	
     $_SESSION['admin'] = $fila["admin"];
     $_SESSION['idusuario'] = $fila["id"];
  	
	 // verifico que este chequeado el recordarme
	 
	 header("location:boletin.php");	
	
}else{
	header("location:index.php?error=1");
	}

?>