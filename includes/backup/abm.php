  <?php
	include("../inc_conectores.php");
	$paso= $_POST['paso'];
	$pagina= $_POST['pagina'];
	$tabla=$_POST["tabla"];
	$columnas=$_POST["columnas"];
	$col = explode("|",$_POST["columnas"]);
	$clave= $_POST["clave"];
	$sel1="";
	$sel2="";
	$sel3="";
	$buscador=($clave=="")?"":"";

$dir = "../../backup/"; 
$directorio=opendir($dir); 


  $inicio=($paso*$pagina)-$paso;
  if($paso*$pagina>$cant_filas){
    $maximo=$cant_filas;
  }else{
    $maximo=$paso*$pagina;
  }
  if($paso==5){
    $sel1="selected='selected'";  
  }else if($paso==10){
    $sel2="selected='selected'";
  }else if($paso==15){
    $sel3="selected='selected'";
  }

while ($archivo = readdir($directorio)){ 
	
 if($archivo=='.' or $archivo=='..'){ 
 echo ""; 
 }else { 
 	$cont++;
	$clase=($cont % 2 ==0)?"clara":"oscuro";
 $enlace = $dir.$archivo; 
 $hora = date("d/m/Y H:i:s", filectime($enlace));
 ?>
 <tr id="f<?=$cont?>" class="fila <?=$clase ?>">
        <td style="width:30px">
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?=$cont?>)" value="<?=$enlace?>"/>
        </td>
        <td ><?=$hora ?></td>
        <td ><?=$archivo ?></td>
       
      </tr>
  <?php    
}
}


  $inicio=($paso*$pagina)-$paso;
  if($paso*$pagina>$cont){
    $maximo=$cont;
  }else{
    $maximo=$paso*$pagina;
  }
  if($paso==5){
    $sel1="selected='selected'";  
  }else if($paso==10){
    $sel2="selected='selected'";
  }else if($paso==15){
    $sel3="selected='selected'";
  }
?>

 <tr class="panel-footer">
<td class="col-md-12" colspan="<?=count($col)+1?>">
  <div id="paginador" class="pull-right" >
    <div class="pag">
    <span>mostrar filas</span>  
        <select id="selector"  onChange="cambio_paso()">
          <option <?php echo $sel1?>>5</option>
          <option <?php echo $sel2?>>10</option>
          <option <?php echo $sel3?>>15</option>
        </select>
        <span><?php echo $inicio+1 ?>-<?php echo $maximo ?> de <?php echo $cont ?></span>
        <button id="atras" type="button"  onClick="atras()" class="btn btn-xs btn-info"><i class="fa fa-fw fa-chevron-left"></i></button>
        <button id="adelante" type="button"  onClick="avanzar()" class="btn btn-xs btn-info"><i class="fa fa-fw fa-chevron-right" ></i></button>
        <input id="cant_filas" type="hidden" value="<?php echo $maximo ?>"/>
      </div>
    </div>
    </td>
</tr>    