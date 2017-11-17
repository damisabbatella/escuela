<?include("../../includes/inc_conectoresi.php");

$sql="SELECT * from grupo where idcurso=".$_POST["idcurso"];
$resultado=mysqli_query($con,$sql);
?>
<option value='0' selected='selected'>seleccione grupo</option>
<?

while($fila=mysqli_fetch_assoc($resultado)){
?>
<option value="<?=$fila["id"]?>"><?=$fila["nombre"]?></option>



<?
}
?>


