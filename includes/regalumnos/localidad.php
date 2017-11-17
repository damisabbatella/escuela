<?
include("../inc_conectoresi.php");

$sql="SELECT * from localidades where idprovincia=".$_POST["idprovincia"];
$resultado=mysqli_query($con,$sql);
?>
<option value='0' selected='selected'>seleccione localidad</option>
<?

while($fila=mysqli_fetch_assoc($resultado)){
?>
<option value="<?=$fila["id"]?>"><?=$fila["localidad"]?></option>



<?
}








?>