<?php
include("inc_conectoresi.php");
$correos=$_POST['correo'];
$sql="SELECT * from usuarios where email='$correos' and status=1";
$result=mysqli_query($con,$sql);
$mail=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==0){

echo 0;

}else{

//el email esta en la base de datos y lo envio
$headers  = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
$headers .= 'From:IFPB|Instituto Brienza<informes@institutobrienza.com.ar>'."\r\n";

$cuerpo ="

<div style='background-color:#f1f1f1;width:100%;height:682px;margin:0 auto;padding-top:10px;'>
<div style='width:95%;height:50px;margin:0 auto;
background-color:#000;color:#fff;text-align:center;font-size:13px;line-height:50px;'>

<h1 style='color:#fff;text-align:center;font-size:15px;line-height:50px;'>IFPB|Instituto Brienza</h1>


</div>
<div style='width:95%;height:400px;margin:0 auto;
background-color:#fff;border:#999 solid 1px;'>

<div style='width:85%;height:400px;margin:10px auto;
background-color:#fff;'>

Estimado/a ".$mail["admin"]."<br><br>

Haga click en el siguiente link o peguelo en la barra de direcciones de su navegador
<a href='http://www.institutobrienza.com.ar/brienza_14567!/modificarc.php?correo=".$correos."&admin=".$mail["admin"]."'>http://www.institutobrienza.com.ar/brienza_14567!/modificarc.php?correo=".$correos."&admin=".$mail["admin"]."</a><br><br>Saluda Atte.
IFPB|Instituto Brienza</div></div>
</div>";
 
mail($correos,"Modificacion de password", $cuerpo ,$headers);		
	echo 1;
}





?>