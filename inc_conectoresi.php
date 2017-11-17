<?php
$host = "localhost";
$usuario = "brienza14567";
$contrasena = "brienza_14567!";
$base = "brienza";
$con=mysqli_connect($host,$usuario,$contrasena,$base);
mysqli_query($con,"SET NAMES 'utf8'");//configurar los acentos y la ñ en castellano

?>