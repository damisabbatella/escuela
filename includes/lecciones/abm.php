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
	
	$filtro=($_POST["filtro"]!=0)? "and a.idcurso=".$_POST["filtro"]:"";
	include("../inc_paso.php"); 
	$sql = "select a.id idleccion,a.$col[0],a.$col[1],a.$col[2],a.$col[3],a.$col[4],a.$col[5],a.status,
	b.id,b.nombre,
	c.id,c.curso 

	from $tabla a, capitulos b,cursos c where
	 a.status=1 and 
	 b.id=a.$col[1] and
	 c.id=a.$col[0]
	 $filtro limit $inicio,$paso";
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
        <td style="width:30px">
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['idleccion']?>"/>
        </td>
        <td ><input type="text" class="campo" value="<?php echo $fila[$col[5]]?>" onblur="ordenlecciones(<?=$fila["idleccion"]?>,this.value)"/></td>

        <td ><?php echo $fila["curso"] ?></td>
        <td ><?php echo $fila["nombre"] ?></td>
        <td ><?php echo $fila[$col[2]] ?></td>
        <td ><?php echo $fila[$col[3]] ?></td>
       <td ><?php echo $fila[$col[4]] ?></td>
      </tr>
	  <?php }
	  ?>
      <?php include("../inc_paginador.php"); ?>