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
		$buscador=" and a.id like '%$clave%'";
	}
	include("../inc_paso.php"); 
	//escribimos un alias porque id se repite tres veces
	$sql = "SELECT  
	a.id idpregunta ,a.idcurso,a.idcapitulo,a.texto,a.status,
	 b.id,b.curso,
	 c.id,c.nombre 
	 from preguntas a,cursos b,capitulos c 
	 where a.status=1
	 and b.id=a.idcurso 
	 and c.id=a.idcapitulo
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
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['idpregunta']?>"/>
        </td>
        <td ><?php echo $fila["curso"] ?></td>
        <td ><?php echo $fila["nombre"] ?></td>
       <td ><?php echo $fila["texto"] ?></td>
      </tr>
	  <?php }
	  ?>
      <?php include("../inc_paginador.php"); ?>