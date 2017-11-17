<div class="modal-header panel-heading bg-success">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">CONSULTA</h4>
</div>
<div class="modal-body ">
  <div class="row">
    <?php
    session_start();
    include("../inc_conectoresi.php");
    $sql="SELECT * from boletin where id=".$_POST["idconsulta"]." and status=2";
    $resultado=mysqli_query($con,$sql);
    $fila=mysqli_fetch_assoc($resultado);
    ?>
    <div class="form-group col-lg-10">
      <label id="contacto"><?=$fila["contacto"]?></label>
      </br>
      <th id="mensaje"><?=$fila["mensaje"]?></th>
      
    </div>
    
    
    
    <div class="form-group col-lg-10">
      <label>Respuesta de &nbsp;<?php echo $_SESSION["admin"];?>&nbsp;&nbsp;<?php echo $fila["horarespuesta"];?>&nbsp;&nbsp;<?php echo $fila["fecharespuesta"];?></label><br>
      
      <textarea cols="80" rows="15"  id="mensaje" class="form-control"><? echo $fila["respuesta"]?></textarea>
    </div>
  </div>
  <div class="modal-footer panel-heading bg-active">
    
    
  </div>