<?php include("../../includes/inc_conectoresi.php");

$numcurso=$_POST["numcurso"];
$numalumno=$_POST["numalumno"];

$sql = "INSERT INTO relcursosalumnos(idalumno,idcurso,status) values ('".$numalumno."','".$numcurso."',1)";
mysqli_query($con,$sql);

?>

