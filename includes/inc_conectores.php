<?php
//Me conecto a la base de datos
$host = "localhost";
$usuario = "brienza14567";
$contrasena = "brienza_14567!";
$base = "brienza";
$db=mysql_connect($host,$usuario,$contrasena);
mysql_query("SET NAMES 'utf8'");//configurar los acentos y la ñ en castellano
mysql_select_db($base,$db);
?>


