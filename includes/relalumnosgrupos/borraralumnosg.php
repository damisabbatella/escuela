<?include("../../includes/inc_conectoresi.php");
$sql="DELETE from relalumnosgrupos where id=".$_POST["idalu"];
mysqli_query($con,$sql);





?>

