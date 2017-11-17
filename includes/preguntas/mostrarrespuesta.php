<?
include("../inc_conectoresi.php");

$sql="select * from respuestas where idpregunta=".$_POST["idpregunta"];

$resultado=mysqli_query($con,$sql);

?>
<div class="col-lg-12">
<table class="table table-striped">
<thead>
<tr>
<th>Respuesta</th>	
<th>Correcta</th>	
<th>Editar</th>	
<th>Borrar</th>	
</tr>
</thead>	
<tbody>
	



<?
while ($fila=mysqli_fetch_assoc($resultado)) {
	$sel=($fila["correcta"]==1)?"checked":"";
?>
<tr>
<td class="col-lg-4" id="contexto<?=$fila["id"]?>"><?=$fila["texto"]?></td>
<td class="col-lg-1"><input type="radio" name="respuesta" onclick="marcarcorrecta(<?=$fila["id"]?>,<?=$_POST["idpregunta"]?>)" <?=$sel?>/></td>	
<td class="form-group col-lg-1"><button id="botoneditar<?=$fila["id"]?>" class="btn btn-default" onclick="editartextor(<?=$fila["id"]?>)">Editar</button>
<button style="display:none" id="botonguardar<?=$fila["id"]?>" class="btn btn-primary" onclick="guardartextor(<?=$fila["id"]?>,<?=$_POST["idpregunta"]?>)">Guardar</button>
</td>

<td class="form-group col-lg-1"><button class="btn btn-default" type="button" onclick="borrarrespuesta(<?=$fila["id"]?>,<?=$_POST["idpregunta"]?>)">Borrar</button></td>

</tr>	
<? }








?>
</tbody>

</table>
</div>