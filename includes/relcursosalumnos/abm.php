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
	$sql = "SELECT a.id idrel,a.idalumno,a.idcurso,a.status,b.id,b.nombre,c.id,c.curso from relcursosalumnos a,regalumnos b,cursos c where a.status=1 and b.id=a.idalumno and c.id=a.idcurso $buscador limit $inicio,$paso";
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
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['idrel']?>"/></td>
         
        <td><?php echo $fila["nombre"]?></td>
       <td><?php echo $fila["curso"] ?></td>
        
      </tr>
	  <?php }
	  ?>
      <?php include("../inc_paginador.php"); ?>
