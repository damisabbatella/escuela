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
		$buscador=" and a.$col[0] like '%$clave%'";
	}
	include("../inc_paso.php"); 
	$sql = "SELECT a.id,a.nombre,a.apellido,a.email,a.pais,a.status,
	b.id idpais,b.paisnombre  
	from alumnos a,pais b
	 where 
	 a.status=1
     and b.id=a.pais
	  $buscador limit $inicio,$paso";
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
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['id']?>"/>
        </td>
        <td ><?php echo $fila[$col[0]] ?></td>
        <td ><?php echo $fila[$col[1]] ?></td>
        <td ><?php echo $fila[$col[2]] ?></td>
        <td ><?php echo $fila["paisnombre"] ?></td>
       
      </tr>
	  <?php }
	  ?>
      <?php include("../inc_paginador.php"); ?>