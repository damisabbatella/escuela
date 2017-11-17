<?php
	include("../../includes/inc_conectoresi.php");
	$paso= $_POST['paso'];
	$pagina= $_POST['pagina'];
	$tabla=$_POST["tabla"];
	$columnas=$_POST["columnas"];
	$col = explode("|",$_POST["columnas"]);
	$clave= $_POST["clave"];
	$sel1="";
	$sel2="";
	$sel3="";
	if($clave==""){
		$buscador="";
	}else{
		$buscador=" and $col[0] like '%$clave%'";
	}
	include("../inc_pasoboletin.php");
	$sql = "select * from $tabla  where status=2  $buscador  order by id desc limit $inicio,$paso";
	$res = mysqli_query($con,$sql);
	$cont = 0;
	while ($fila = mysqli_fetch_assoc($res)){
	$cont++;
	if($cont % 2 ==0){
		$clase = "clara";
	}else{
		$clase = "oscuro";
	}
?>
<tr id="f<?php echo $cont?>" class="fila <?php echo $clase ?>">
	<td>
		<input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['id']?>"/>
	</td>
	<td ><?php echo $fila["contacto"] ?></td>
	<td><?php echo $fila["fecha"] ?></td>
	<td><?php echo substr($fila["hora"],0,-3)?></td>
	<td><?php echo $fila["email"] ?></td>
	
	
	<td><?php echo $fila["curso"] ?></td>
	<td><button type="button" class="btn btn-md btn-success" onClick="verconsulta(<?=$fila["id"]?>)">ver</button></td>
</tr>
<?php }
?>
<?php include("../inc_paginador.php"); ?>