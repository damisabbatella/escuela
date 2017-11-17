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
	include("../inc_paso.php");
	$sql = "SELECT * from relalumnosgrupos where status=1 $buscador limit $inicio,$paso";
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
<tr id="f" class="fila <?php echo $clase ?>">
	<td>
		<input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['id']?>"/></td>
		
		<td><?php echo $fila["idalumno"]?></td>
		<td ><?php echo $fila["idcurso"] ?></td>
		
		<td><?php echo $fila["idgrupo"];?></td>
		
	</tr>
	<?php }
	?>
	<?php include("../inc_paginador.php"); ?>