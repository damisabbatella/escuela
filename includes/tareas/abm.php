<?php
	include("../inc_conectoresi.php");
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
		$buscador=" and a.$col[0] like '%$clave%'";
	}
	include("../inc_paso.php");
	$sql="SELECT a.id idtarea,a.nombre,a.idadmin,a.fechavenc,a.estado,a.status,b.id,b.usuario from tareas a,usuarios b where a.status=1 and b.id=a.idadmin
		$buscador  limit $inicio,$paso";
	$resultado= mysqli_query($con,$sql);
	$cont = 0;
	
	while($tareas=mysqli_fetch_assoc($resultado)){
	$cont++;
	if($cont % 2 ==0){
		$clase = "clara";
	}else{
		$clase = "oscuro";
	}
?>
<tr id="f<?php echo $cont?>" class="fila <?php echo $clase ?>">
	<td>
		<input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $tareas['idtarea']?>"/>
	</td>
	<td ><?php echo $tareas["nombre"] ?></td>
	<td ><?php echo $tareas["usuario"] ?></td>
	<td ><?php echo $tareas["fechavenc"]?></td>
	<td><button type="button" class="btn btn-success botont" onClick="altacomentariost(<?php echo $tareas['idtarea']?>)">ver comentarios de tareas</button></td>
	
	<?
	if($tareas["estado"]==0){
	?>
	<td><button type="button" class="btn btn-danger">Pendiente</button></td>
	<td ><button style="display:none" type="button" class="btn btn-danger" onclick="cambiarestadop(<?php echo $tareas["idtarea"]?>)">P</button>
	<button    type="button" class="btn btn-info" onclick="cambiarestadoi(<?php echo $tareas["idtarea"]?>)">I</button>&nbsp;&nbsp;&nbsp;<button  type="button" class="btn btn-success" onclick="cambiarestadof(<?php echo $tareas["idtarea"]?>)">F</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning" onclick="cambiarestadoa(<?php echo $tareas["idtarea"]?>)">A</button></td>
	<?
	}
	else if($tareas["estado"]==1){
	?>
	<td><button type="button" class="btn btn-info">iniciado</button></td>
	<td><button style="display:none" type="button" class="btn btn-info" onclick="cambiarestadoi(<?php echo $tareas["idtarea"]?>)">I</button>&nbsp;&nbsp;&nbsp;<button  type="button" class="btn btn-success" onclick="cambiarestadof(<?php echo $tareas["idtarea"]?>)">F</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning" onclick="cambiarestadoa(<?php echo $tareas["idtarea"]?>)">A</button></td>
	<?}
	else if($tareas["estado"]==2){
	?>
	<td><button type="button" class="btn btn-success">Finalizado</button></td>
	<td><button style="display:none" type="button" class="btn btn-success" onclick="cambiarestadof(<?php echo $tareas["idtarea"]?>)">F</button>&nbsp;&nbsp;&nbsp;<button style="display:none" type="button" class="btn btn-info" onclick="cambiarestadoi(<?php echo $tareas["idtarea"]?>)">I</button>&nbsp;&nbsp;&nbsp;<button style="display:none" type="button" class="btn btn-danger" onclick="cambiarestadop(<?php echo $tareas["idtarea"]?>)">P</button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning" onclick="cambiarestadoa(<?php echo $tareas["idtarea"]?>)">A</button></td>
	<?}
	?>
	
	
	
	
	
	
	
	
</tr>
<?php }
?>
<?php include("../inc_paginador.php"); ?>