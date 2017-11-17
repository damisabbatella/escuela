<?

include("../inc_conectoresi.php");

$sql="update cursos set orden=" .$_POST['nuevoorden']." where id=".$_POST['idcurso'];
mysqli_query($con,$sql);



















?>