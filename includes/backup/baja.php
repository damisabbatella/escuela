<?php

$sel=$_POST["seleccionados"];
$tabla=$_POST["tabla"];
$registros=explode("|", $sel);
for($x=0;$x<count($registros)-1;$x++){

	unlink($registros[$x+1]);
	
}
?>