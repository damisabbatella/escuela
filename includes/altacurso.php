<?php
include("inc_conectoresi.php");

if($_FILES['foto_portada']['size']!=""){

$tipo = $_FILES['foto_portada']['type'];
$tamano = $_FILES['foto_portada']['size'];
$tmp = $_FILES['foto_portada']['tmp_name'];
$ruta="../../img/portfolio";
$ancho_fijo=1920;
//este alto fijo no se utiliza porque todas las portadas van a ser apaisadas
$alto_fijo=1080;
//renombro la foto
$ext=explode('/',$tipo);
$aleatorio=rand(0,999999999);
$nuevo_nombre="port-".$aleatorio.'.'.$ext[1];

if($tamano){
if($tipo == "image/pjpeg" || $tipo == "image/jpeg"){
$nueva_img = imagecreatefromjpeg($tmp);
}elseif($tipo == "image/x-png" || $tipo == "image/png"){
$nueva_img = imagecreatefrompng($tmp);
}elseif($tipo == "image/gif"){
$nueva_img = imagecreatefromgif($tmp);
}
}


//Obtener el ancho y alto de la imagen

list($ancho, $alto) = getimagesize($tmp);
$proporcion = $ancho/$alto;
if($proporcion >1){
	$nuevo_ancho=$ancho_fijo;
	$nuevo_alto=$ancho_fijo/$proporcion;
}else{
	//este no se va a cumplir porque todas las portadas van a ser apaisadas
	$nuevo_ancho=$alto_fijo*$proporcion;
	$nuevo_alto=$alto_fijo;
}



$img_redimensionada = imagecreatetruecolor($nuevo_ancho,$nuevo_alto);


imagecopyresampled($img_redimensionada, $nueva_img, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);


if($tipo == "image/x-png" || $tipo == "image/png"){
    imagepng ($img_redimensionada,"$ruta/$nuevo_nombre");
}else{
	imagejpeg ($img_redimensionada,"$ruta/$nuevo_nombre",80);
	}
imagedestroy ($img_redimensionada);
imagedestroy ($nueva_img);

//$tinymce = htmlentities($_POST['datos3']);
$tinymce = $_POST['datos2'];
$sql = "INSERT INTO cursos (curso,descripcion,texto,imagen,status) values ('".$_POST['datos0']."','".$_POST['datos1']."','".$tinymce."','".$nuevo_nombre."',1)";

//echo $sql;
mysqli_query($con,$sql);
header('Location:../cursos.php');

}else{

$tinymce = $_POST['datos2'];
$sql = "INSERT INTO cursos (curso,descripcion,texto,status) values ('".$_POST['datos0']."','".$_POST['datos1']."','".$tinymce."',1)";

//echo $sql;
mysqli_query($con,$sql);
header('Location:../cursos.php');



}

?>