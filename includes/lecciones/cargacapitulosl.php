<?
include("../inc_conectoresi.php");

$sql="SELECT * from capitulos where idcursosc=".$_POST["idcurso"]." and status=1";
$resultado=mysqli_query($con,$sql);
?>
<option value='0' selected='selected'>seleccione capitulos</option>
<?

while($fila=mysqli_fetch_assoc($resultado)){
?>
<option value="<?=$fila["id"]?>"><?=$fila["nombre"]?></option>



<?
}








?>