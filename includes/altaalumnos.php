<?php
include("inc_conectoresi.php");

if($_FILES['foto_alumno']['size']!=""){

$tipo = $_FILES['foto_alumno']['type'];
$tamano = $_FILES['foto_alumno']['size'];
$tmp = $_FILES['foto_alumno']['tmp_name'];
$ruta="../fotos/portfolio";
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

$sql = "INSERT INTO regalumnos (nombre,apellido,fotoperfil,email,direccion,idprovincia,idlocalidad,edad,dni,estado,fecha,fechanac,recomendaciones,idcurso,id_curso,telefono,tellaboral,nacionalidad,estudios,status) values ('".$_POST['nombre']."','".$_POST['apellido']."','".$nuevo_nombre."','".$_POST['email']."','".$_POST['direccion']."','".$_POST['provincia']."','".$_POST['localidad']."','".$_POST['edad']."','".$_POST['dni']."','".$_POST['estado']."','".$_POST['fecha']."','".$_POST['fechanac']."','".$_POST['conocimiento']."','".$_POST['curso']."','".$_POST['curso1']."','".$_POST['telefono']."','".$_POST['telefonot']."','".$_POST['nacionalidad']."','".$_POST['estudios']."',1)";

//echo $sql;
mysqli_query($con,$sql);
header('Location:../regalumnos.php');

}else{


$sql ="INSERT INTO regalumnos (nombre,apellido,email,direccion,idprovincia,idlocalidad,edad,dni,estado,fecha,fechanac,recomendaciones,idcurso,id_curso,telefono,tellaboral,nacionalidad,estudios,status) values ('".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['email']."','".$_POST['direccion']."','".$_POST['provincia']."','".$_POST['localidad']."','".$_POST['edad']."','".$_POST['dni']."','".$_POST['estado']."','".$_POST['fecha']."','".$_POST['fechanac']."','".$_POST['conocimiento']."','".$_POST['curso']."','".$_POST['curso1']."','".$_POST['telefono']."','".$_POST['telefonot']."','".$_POST['nacionalidad']."','".$_POST['estudios']."',1)";

//echo $sql;
mysqli_query($con,$sql);
header('Location:../regalumnos.php');



}

?>