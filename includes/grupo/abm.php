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
	$sql = "SELECT a.id idgrupo,a.nombre,a.idcurso,a.lu,a.ma,a.mie,a.jue,a.vie,a.sab,a.inicio,a.finaliza,a.status,b.id,b.curso from grupo a,cursos b where a.status=1 and b.id=a.idcurso $buscador limit $inicio,$paso";
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
		<input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['idgrupo']?>"/></td>
		
		<td><?php echo $fila["nombre"]?></td>
		<td ><?php echo $fila["curso"] ?></td>
		<?
		if($fila["lu"]!=0){?><td>Lunes</td><?}else{?><td><?php echo "-";?></td>
		<?}if($fila["ma"]!=0){?><td>Martes</td><?}else{?><td><?php echo "-";?></td>
		<?}if($fila["mie"]!=0){?><td>Miercoles</td><?}else{?><td><?php echo "-";?></td>
		<?}if($fila["jue"]!=0){?><td>Jueves</td><?}else{?><td><?php echo "-";?></td>
		<?}
		if($fila["vie"]!=0){?><td>Viernes</td><?}else{?><td><?php echo "-";?></td>
		<?}if($fila["sab"]!=0){?><td>Sabados</td><?}else{?><td><?php echo "-";?></td><?}?>
		<td><?php echo $fila["inicio"];?>hs</td>
		<td><?php echo $fila["finaliza"];?>hs</td>
	</tr>
	<?php }
	?>
	<?php include("../inc_paginador.php"); ?>