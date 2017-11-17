<?php
include("../inc_conectoresi.php");

$curso=$_POST["datos0"];
$descripcion=$_POST["datos1"];
$texto=$_POST["datos2"];

if($_FILES['foto_portada']['size']>0){

$tipo = $_FILES['foto_portada']['type'];
$tamano = $_FILES['foto_portada']['size'];
$tmp = $_FILES['foto_portada']['tmp_name'];
$ruta="../../../img/portfolio";
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


$sql="update cursos set curso='$curso', descripcion='$descripcion',texto='$texto',imagen='$nuevo_nombre' where id=".$_GET["id"]; 
}else{

$sql="update cursos set curso='$curso', descripcion='$descripcion',texto='$texto' where id=".$_GET["id"];


}
mysqli_query($con,$sql);
header("location:../../cursos.php")
?>


