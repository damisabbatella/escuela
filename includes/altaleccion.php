<?php
include("inc_conectoresi.php");


//$tinymce = htmlentities($_POST['datos3']);
$tinymce = $_POST['datos2'];
$sql = "INSERT INTO lecciones (idcurso,idcapitulo,titulo,copete,descripcion,status) values ('".$_POST["datos3"]."','".$_POST["datos4"]."','".$_POST['datos0']."','".$_POST['datos1']."','".$tinymce."',1)";

//echo $sql;
mysqli_query($con,$sql);
header('Location:../lecciones.php');



?>