<?php
include("../../includes/inc_conectoresi.php");

$sql = "SELECT * from saldo";
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);
echo "$".$fila["valor"];



?>


