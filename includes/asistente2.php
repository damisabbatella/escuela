<?php
include("../includes/inc_conectoresi.php");
$clave= $_POST["clave"];
$tabla=$_POST["tabla"];
$columnas=$_POST["columnas"];
$col = explode("|",$_POST["columnas"]);
$bus=$_POST["col_busqueda"];
echo $clave;
 $sql="select * from boletin where status=2  and $col[$bus] like '%$clave%' order by $col[$bus] desc limit 5";
$res=mysqli_query($con,$sql);
while($fila=mysqli_fetch_assoc($res)){
	echo '<div onClick="filtrar(\''.$fila[$col[$bus]].'\')">'.$fila[$col[$bus]]."</div>";
}

?>