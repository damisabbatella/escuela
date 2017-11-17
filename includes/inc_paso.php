<?php 
$cant_filas = mysqli_num_rows(mysqli_query($con,"select a.id from $tabla a where a.status=1 $buscador"));
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
  }else if($paso==50){
    $sel3="selected='selected'";
  }
  else if($paso==100){
    $sel4="selected='selected'";
  }
  ?>