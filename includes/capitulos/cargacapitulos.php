<?
include("../inc_conectoresi.php");

$sql="SELECT * from capitulos where idcursosc=".$_POST["idcurso"];
$resultado=mysqli_query($con,$sql);
while($fila=mysqli_fetch_assoc($resultado)){
?>
<option value="<?=$fila["id"]?>"><?=$fila["nombre"]?></option>



<?
}





?>