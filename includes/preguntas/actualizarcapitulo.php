<?php
include("../inc_conectoresi.php");
 $sql="SELECT * from capitulos where idcursosc=".$_POST["idcurso"]." and status=1";
$resultado=mysqli_query($con,$sql);

echo '<option value="0" selected="selected">seleccione un capitulo</option>';

while($capitulos=mysqli_fetch_assoc($resultado)){

?>
<option value="<?=$capitulos["id"]?>"><?=$capitulos["nombre"]?></option>




<?}


?>