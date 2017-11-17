<?php
include("../../includes/inc_conectoresi.php");
$clave= $_POST["buscaralumno"];


$sql="SELECT * from regalumnos where nombre like '%$clave%'  and status=1 order by nombre limit 5";
$res=mysqli_query($con,$sql);
while($fila=mysqli_fetch_assoc($res)){
	echo '<div class="cursor" onClick="vercuentacorriente(\''.$fila["id"].'\')">'.$fila["nombre"]."</div>";

?>

<input type="text" id="numalumno" value="$fila['id']"/>

}?>



    