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
	  session_start(); 
	$sql = "select * from regalumnos where status=1  $buscador order by id desc limit $inicio,$paso";
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
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['id']?>"/>
        </td>
        <td class="col-md-2">
<?

$imagen=($fila["fotoperfil"]!="")?$fila["fotoperfil"]:"sinimagen.jpg";
?>




<img  class="img-thumbnail" src="fotos/portfolio/<?php echo $imagen ?>"/>

  </td>   
        <td style="width:800px"><?php echo $fila["nombre"] ?></td>
        <td ><?php echo $fila["apellido"] ?></td>
         <td ><?php echo $fila["email"] ?></td>
          <td ><?php echo $fila["telefono"] ?></td>
          <td ><?php echo $fila["tellaboral"] ?></td>
 
         
         <td><button type="button" class="btn btn-md btn-success" onClick="veralumno(<?=$fila["id"]?>)">ver</button></td>
      </tr>
	  <?php }
	  ?>
      <?php include("../inc_paginador.php"); ?>