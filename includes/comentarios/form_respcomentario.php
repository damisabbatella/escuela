<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">formulario comentarios</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
        <?
         include("../inc_conectoresi.php");
$sql="SELECT * from comentarios where id=".$_POST["comentarios"];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);




        ?>
            <div class="form-group col-lg-10">
    <label>Comentarios</label>

    <th><?=$fila["pregunta"]?></th>
   
  </div>
  
  
  
  <div class="form-group col-lg-10">
    <label>responder comentarios</label>
   <textarea  id="respcomentario" class="form-control"></textarea>

  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-default"  onclick="enviocomentario(<?=$fila["id"]?>)">Responder</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>


