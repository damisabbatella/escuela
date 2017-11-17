<?
include("../inc_conectoresi.php");

$sql="SELECT * from capitulos where idcursosc=".$_POST["idcurso"];
$resultado=mysqli_query($con,$sql);
echo "<option value='0' selected='selected'>seleccione capitulo</option>";
while($fila=mysqli_fetch_assoc($resultado)){
?>
<option value="<?=$fila["id"]?>"><?=$fila["nombre"]?></option>



<?
}





?>