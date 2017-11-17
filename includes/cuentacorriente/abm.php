  <?php
	include("../../includes/inc_conectoresi.php");
  $sql="SELECT * FROM saldocuentacorriente where idalumno=".$_POST["idalumno"];
  $res=mysqli_query($sql);
  $saldo=mysqli_fetch_assoc($res)

?>
<tr>
         
        <td><? echo "saldo:".$saldo["valor"];?></td>
        </tr>
        <?
$sql = "SELECT * from cuentacorriente where idalumno=".$_POST["idalumno"];
	$res = mysqli_query($con,$sql);

	while ($fila = mysqli_fetch_assoc($res)){
	


   
        ?>
         
         <tr>
         
        <td><?php echo $fila["fecha"]?></td>
       <td><?php echo $fila["idalumno"] ?></td>
        <td><?php echo $fila["concepto"]?></td>
          <td><?php  echo $fila["debe"]?></td>
            <td><?php echo $fila["haber"]?></td>
     </tr>
	
	 <?} ?>
	
	







