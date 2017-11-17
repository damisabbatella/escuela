<?php
include("../../includes/inc_conectoresi.php");
$fecha=$_POST["fecha"];
$descripcion=$_POST["descripcion"];
$salida=$_POST["salida"];
$entrada=$_POST["entrada"];
$sql = "INSERT INTO caja (fecha,descripcion,egreso,ingreso) values ('".$fecha."','".$descripcion."','".$salida."','".$entrada."')";

//echo $sql;
mysqli_query($con,$sql);



$sql = "UPDATE saldo set valor=valor+".($entrada-$salida);

//echo $sql;
mysqli_query($con,$sql);

?>


