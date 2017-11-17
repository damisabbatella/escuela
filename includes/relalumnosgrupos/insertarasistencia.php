<?php include("../../includes/inc_conectoresi.php");

$presente=$_POST["presente"];
$idalumno=$_POST["numeralumno"];
$ausente=$_POST["ausente"];
$fecha=$_POST["fecha"];

echo $sql = "INSERT INTO asitencias(fecha,idalumno,presente,ausente) values ('".$fecha."','".$idalumno."','".$presente."','".$ausente."')";
mysqli_query($con,$sql);




                 ?>








