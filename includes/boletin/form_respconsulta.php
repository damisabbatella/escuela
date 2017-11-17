<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">formulario consulta</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
        <?
         include("../inc_conectoresi.php");
$sql="SELECT * from boletin where id=".$_POST["consulta"]." and status=1";
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);




        ?>
            <div class="form-group col-lg-10">
    <label>Consulta de <? echo $fila["contacto"]?> </label></br>
<label><?=$fila["curso"]?></label><br>
    <th><?=$fila["mensaje"]?></th>
   
  </div>
  
  
  
  <div class="form-group col-lg-10">
    <label>responder consulta</label>
   <textarea cols="80" rows="15"  id="respconsulta" class="form-control"></textarea>

  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-default"  onclick="envioemailconsulta(<?=$fila["id"]?>)">Responder</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
 

        </div>
     