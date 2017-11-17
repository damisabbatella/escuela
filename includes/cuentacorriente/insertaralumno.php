<?php include("../../includes/inc_conectoresi.php");

$alumno=$_POST["numalumno"];

$sql = "INSERT INTO cuentacorriente(idalumno) values ('".$alumno."')";
mysqli_query($con,$sql);




                 ?>








