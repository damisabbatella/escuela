<?

include("../inc_conectoresi.php");

$sql="update lecciones set numero=".$_POST['nuevoorden']." where id=".$_POST['idcurso'];
mysqli_query($con,$sql);



















?>