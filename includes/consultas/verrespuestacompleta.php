<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ver respuesta</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
        <?
         include("../inc_conectores.php");
$sql="SELECT * from consultas where id=".$_POST["respconsulta"];
$resultado=mysql_query($sql);
$fila=mysql_fetch_assoc($resultado);




        ?>
            <div class="form-group col-lg-10">
    

    <th><?=$fila["respuesta"]?></th>
   
  </div>
  
  
  
 
        </div>
        <div class="modal-footer panel-heading bg-active">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>


