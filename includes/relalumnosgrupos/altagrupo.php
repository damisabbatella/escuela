<?php include("../../includes/inc_conectoresi.php");
$nomgrupo=$_POST["nombre"];
$curso=$_POST["curso"];
$hi=$_POST["hi"];
$hf=$_POST["hf"];
$lu=$_POST["lu"];
$ma=$_POST["ma"];
$mie=$_POST["mie"];
$jue=$_POST["jue"];
$vie=$_POST["vie"];
$sab=$_POST["sab"];

echo $sql = "INSERT INTO grupo(nombre,idcurso,lu,ma,mie,jue,vie,sab,inicio,finaliza,status) values ('".$nomgrupo."','".$curso."','".$lu."','".$ma."','".$mie."','".$jue."','".$vie."','".$sab."','".$hi."','".$hf."',1)";
mysqli_query($con,$sql);

?>

