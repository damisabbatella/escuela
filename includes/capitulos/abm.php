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

	$filtro=($_POST["filtro"]!=0)? "and a.idcursosc=".$_POST["filtro"]:"";
	
	include("../inc_paso.php"); 
	$sql = "SELECT  
	a.id numcapitulo,a.nombre,a.idcursosc,a.descripcion,a.numero,a.status,
	 b.id,b.curso 
	 from capitulos a,cursos b 
	 where a.status=1
	 and b.id=a.idcursosc
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
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['numcapitulo']?>"/>
        </td>

         <td ><input type="text" class="campo" value="<?php echo $fila["numero"]?>" onblur="ordencapitulos(<?=$fila['numcapitulo']?>,this.value)"/></td>
        <td ><?php echo $fila["nombre"] ?></td>
        <td ><?php echo $fila["curso"] ?></td>
       <td ><?php echo $fila["descripcion"] ?></td>

      </tr>
      </td>
	  <?php }
	  ?>
      <?php include("../inc_paginador.php"); ?>