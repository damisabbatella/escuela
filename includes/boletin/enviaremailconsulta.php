<?
include("../inc_conectoresi.php");
//update de la respuesta, la dia y hora, cambia en estado a respondido
date_default_timezone_set("America/Argentina/Buenos_Aires");
$time=time();
$fecha=date("Y-m-d", $time);
$hora= date("H:i:s",$time);
$tinymce = $_POST['respconsulta'];
$sql="UPDATE boletin set respuesta='".$tinymce."',horarespuesta='".$hora."',fecharespuesta='".$fecha."',status=2 where id=".$_POST['idconsulta'];
mysqli_query($con,$sql);
$sql="SELECT * from boletin where id=".$_POST["idconsulta"];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);
$headers  = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
$headers .= 'From:INSTITUTO BRIENZA<informes@institutobrienza.com.ar>'."\r\n";
$cuerpo = "
<div style='background-color:#f1f1f1;width:100%;height:682px;margin:0 auto;'>
	<div style='width:100%;height:50px;margin:0 auto;
		background-color:#007FFF;color:#fff;text-align:center;font-size:13px;line-height:50px;'>
		<h1 style='color:#fff;text-align:center;font-size:28px;line-height:50px;'>INSTITUTO BRIENZA</h1>
	</div>
	<div style='background-color:#fff;width:95%;height:682px;margin:0 auto;'>
		<div style='background-color:#fff;width:92%;height:682px;margin:0 auto;padding-top:10px'>
			<p>Estimado/a ".$fila["contacto"]."</p>
			<p>Su consulta:</p>
			<br><p>".$fila['mensaje']."</p><br>		
			<br>
			<p>Respuesta:</p><br>
			<br><p>".$fila['respuesta']."</p><br>			
			<p>Saluda Atte.</p>
			<p>INSTITUTO BRIENZA</p>
		</div>
	</div>
</div>
</div>";
mail($fila["email"],"INSTITUTO BRIENZA respondio a tu consulta", $cuerpo ,$headers);
?>