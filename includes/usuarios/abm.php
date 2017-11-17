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
	$sql = "select * from usuarios where status=1  $buscador limit $inicio,$paso";
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
        <td style="width:30px">
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['id']?>"/>
        </td>
        <td  class="col-md-1 col-xs-2">
<?

$imagen=($fila["foto"]!="")?$fila["foto"]:"sinimagen.jpg";
?>




<img  class="img-thumbnail" src="fotos/portfolio/<?php echo $imagen ?>"/>

  </td>   
        <td ><?php echo $fila["admin"] ?></td>
        <td ><?php echo $fila["email"] ?></td>
        
      </tr>
	  <?php }
	  ?>
      <?php include("../inc_paginador.php"); ?>