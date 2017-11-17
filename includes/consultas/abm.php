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
	 $sql = "select * from consultas where status=1 $buscador limit $inicio,$paso";
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
        <td style="width:40px">
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $fila['id']?>"/>
        </td>
       
        <td ><?php echo $fila[$col[0]] ?></td>
        <td ><?php echo $fila[$col[1]] ?></td>
       <td ><?php echo $fila[$col[2]] ?></td>
       <?
if(strlen($fila[$col[3]])>99){

       ?>
       
       <td ><?php echo substr($fila[$col[3]],0,100)?>... <a href="javascript:verpregunta(<?=$fila['id']?>)">ver todo</a>
       
       </td>
       <td ><?php echo substr($fila["respuesta"],0,100)?>... <a href="javascript:verrespuesta(<?=$fila['id']?>)">ver todo</a></td>
       
  <? }else{?>

   	 <td ><?php echo $fila[$col[3]]?></td>
       <td ><?php echo $fila["respuesta"]?></td>
   
   <? }?>
   <td >
   <?
       if($fila["estado"]=="respondido"){
       ?>
 <?php echo $fila[$col[4]].''.$fila["horarespuesta"]?>
      
     <? }else{
?>
<button type="button" class="btn btn-md btn-success" onClick="tuconsulta(<?=$fila["id"]?>)">Responder</button>


      <?}?></td>
      </tr>
	  <?php }
	  ?>
      <?php include("../inc_paginador.php"); ?>