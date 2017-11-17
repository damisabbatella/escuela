<?
  include("../inc_conectoresi.php");
//update de la respuesta, la dia y hora, cambia en estado a respondido
  
$time=time();
//18000 son 5 horas de diferencia con respecto al servidor
$canthorasdif=-5;

$fecha=date("Y-m-d H:i", ($time+($canthorasdif*3600)));
 
   
	 
$sql="UPDATE comentarios set respuesta='".$_POST['respcomentario']."',fecharesp='".$fecha."',estado='respondido' where id=".$_POST['idcomentario'];
mysqli_query($con,$sql); 




?>