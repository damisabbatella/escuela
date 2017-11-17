<?php
include("../inc_conectoresi.php");

$titulo=$_POST["datos0"];
$copete=$_POST["datos1"];
$tinymce = $_POST['datos2'];
$curso=$_POST["datos3"];
$capitulo=$_POST["datos4"];


$sql="update lecciones set idcurso='$curso', idcapitulo='$capitulo',titulo='$titulo', copete='$copete', descripcion='$tinymce'  where id=".$_GET["idleccion"];



mysqli_query($con,$sql);

header("location:../../lecciones.php")

?>


