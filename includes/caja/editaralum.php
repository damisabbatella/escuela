<?php
include("../../includes/inc_conectoresi.php");

$fecha=$_POST["fecha"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$estudios=$_POST["estudios"];
$direccion=$_POST["direccion"];
$curso=$_POST["curso"];
$curso1=$_POST["curso1"];
$provincia=$_POST["provincia"];
$localidad=$_POST["localidad"];
$telefono=$_POST["telefono"];
$telefonot=$_POST["telefonot"];
$fechanac=$_POST["fechanac"];
$edad=$_POST["edad"];
$dni=$_POST["dni"];
$nacionalidad=$_POST["nacionalidad"];
$estado=$_POST["estado"];
$email=$_POST["email"];
$conocimiento=$_POST["conocimiento"];

if($_FILES['foto_alumno']['size']>0){

$tipo = $_FILES['foto_alumno']['type'];
$tamano = $_FILES['foto_alumno']['size'];
$tmp = $_FILES['foto_alumno']['tmp_name'];
$ruta="../../fotos/portfolio";
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


$sql="update regalumnos set nombre='".$nombre."',apellido='".$apellido."',fecha='".$fecha."',fotoperfil='".$nuevo_nombre."',estudios='".$estudios."',direccion='".$direccion."',idcurso='".$curso."',id_curso='".$curso1."',idprovincia='".$provincia."',idlocalidad='".$localidad."',telefono='".$telefono."',tellaboral='".$telefonot."',edad='".$edad."',dni='".$dni."',nacionalidad='".$nacionalidad."',estado='".$estado."',email='".$email."',recomendaciones='".$conocimiento."',fechanac='".$fechanac."' where id=".$_GET["idalumno"]; 
}else{

$sql="update regalumnos set nombre='".$nombre."',apellido='".$apellido."',fecha='".$fecha."',estudios='".$estudios."',direccion='".$direccion."',idcurso='".$curso."',id_curso='".$curso1."',idprovincia='".$provincia."',idlocalidad='".$localidad."',telefono='".$telefono."',tellaboral='".$telefonot."',edad='".$edad."',dni='".$dni."',nacionalidad='".$nacionalidad."',estado='".$estado."',email='".$email."',recomendaciones='".$conocimiento."',fechanac='".$fechanac."' where id=".$_GET["idalumno"]; 

}

mysqli_query($con,$sql);
header("location:../../regalumnos.php");

?>


