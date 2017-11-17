<?
  include("../inc_conectoresi.php");
//update de la respuesta, la dia y hora, cambia en estado a respondido
$time=time();
$fecha=date("Y-m-d", $time);
$hora= date("H:i:s",$time);

$sql="UPDATE consultas set respuesta='".$_POST['respconsulta']."',horarespuesta='".$fecha." ".$hora."',estado='respondido' where id=".$_POST['idconsulta'];
mysqli_query($con,$sql); 



$sql="SELECT * from consultas where id=".$_POST["idconsulta"];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);

$headers  = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
$headers .= 'From:Cursoit<info@cursoit.com>'."\r\n";
$cuerpo = "

<div style='background-color:#f1f1f1;width:100%;height:682px;margin:0 auto;padding-top:10px;'>
<div style='width:95%;height:50px;margin:0 auto;
background-color:#f17981;color:#fff;text-align:center;font-size:13px;line-height:50px;'>

<h1 style='color:#fff;text-align:center;font-size:15px;line-height:50px;'>Cursoit</h1>


</div>
<div style='width:95%;height:400px;margin:0 auto;
background-color:#fff;border:#999 solid 1px;'>

<div style='width:85%;height:400px;margin:10px auto;
background-color:#fff;'>
Estimado/a ".$fila["nombre"]."<br><br>
<div style='width:95%;height:50px;margin:0 auto;
background-color:#f17981;color:#fff;text-align:center;font-size:13px;line-height:50px;'>


Su consulta:".$fila['consulta']."<br>

Respuesta:".$fila['respuesta']."






Saluda Atte.
Cursoit</div>
</div>
</div>";
 
mail($fila["email"],"Cursoit respondio a tu consulta", $cuerpo ,$headers); 
echo $sql;
?>