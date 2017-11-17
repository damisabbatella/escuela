<?php
include("../includes/inc_conectoresi.php");
$sel=$_POST["seleccionados"];
$tabla=$_POST["tabla"];
$registros=explode("|", $sel);
if($tabla=="capitulos"){
	//verifico si existe alguna leccion que utilice ese id de capitulo
for($x=0;$x<count($registros)-1;$x++){
//CONSULTO LECCIONES
	$consulta="SELECT * from lecciones where idcapitulo=".$registros[$x+1];
	$res=mysqli_query($con, $consulta);
	if(mysqli_num_rows($res)==0){
//signfica que no hay ninguna leccion que utilice ese capitulo: se puede  tranquilo
	$sql="update $tabla set status=0 where id=".$registros[$x+1];
	mysqli_query($con,$sql);
	
}else{
	echo "No se puede eliminar un capitulo que esta en uso";
}//fin del for
}
}else if($tabla=="cursos"){
	//verifico si existe alguna lecciones que utilice ese id de curso
for($x=0;$x<count($registros)-1;$x++){
//CONSULTO  cursos
	$consulta="SELECT * from lecciones where idcurso=".$registros[$x+1];
	$resultado=mysqli_query($con, $consulta);

	$consulta2="SELECT * from rel_cursos_alumnos where idcurso=".$registros[$x+1];
	$resultado2=mysqli_query($con, $consulta2);
	if(mysqli_num_rows($resultado)==0 and mysqli_num_rows($resultado2)==0){
//signfica que no hay ninguna lecciones que utilice ese curso: se puede  tranquilo
		//echo $resultado;
	$sql="update $tabla set status=0 where idcurso=".$registros[$x+1];
	//echo $registros[$x+1];
	mysqli_query($con,$sql);
	
}else{
	echo "No se puede eliminar un cursos con alumnos inscriptos";
}
}//fin del for
}else if($tabla=="lecciones"){
	for($x=0;$x<count($registros)-1;$x++){
$sql="select * from lecciones where id=".$registros[$x+1];
$resultado=mysqli_query($con,$sql);
$leccion=mysqli_fetch_assoc($resultado);
$curso=$leccion["idcurso"];
$consulta="select * from rel_cursos_alumnos where idcurso=".$curso;
$resultado1=mysqli_query($con,$consulta);
$consulta2="select * from comentarios where idleccion=".$registros[$x+1];
$resultado2=mysqli_query($con,$consulta2);
if(mysqli_num_rows($resultado1)==0 and mysqli_num_rows($resultado2)==0){

$sql="update $tabla set status=0 where id=".$registros[$x+1];
	mysqli_query($con,$sql);

}else{

	echo "No se puede eliminar una leccion que tengan una alumno inscripto al curso";
}
}
}else if($tabla=="alumnos"){
	for($x=0;$x<count($registros)-1;$x++){
$sql="select * from comentarios where idusuario=".$registros[$x+1];
$resultado=mysqli_query($con,$sql);
$consulta="select * from rel_cursos_alumnos where idcurso=".$registros[$x+1];
$resultado1=mysqli_query($con,$consulta);
if(mysqli_num_rows($resultado)==0 and mysqli_num_rows($resultado1)==0){

$sql="update $tabla set status=0 where id=".$registros[$x+1];
	mysqli_query($con,$sql);

}else{

	echo "No se puede eliminar  alumnos que estes  inscriptos en un curso y que tenga un comentario";
}
}
}




else{
	//borrado logico general
for($x=0;$x<count($registros)-1;$x++){
	$sql="update $tabla set status=0 where id=".$registros[$x+1];
	mysqli_query($con,$sql);
	
}
}
?>