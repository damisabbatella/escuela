<?php include("../../includes/inc_conectoresi.php");?>
<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Comentarios</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
          <?

$sql="SELECT * from tareas where id=".$_POST["id"];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);


          ?>



     <div class="form-group col-lg-10">
    <label>Tarea</label>
<div class="row">
    <div class="form-group col-lg-10"><h3><b><?=$fila["nombre"]?></b></h3></div>
   </div>
  </div>
  <?
$sql="SELECT * from comentariost where idtarea=".$fila["id"];
$resultado=mysqli_query($con,$sql);


  ?>
  <div class="form-group col-lg-10">
   
    <? while($comentarios=mysqli_fetch_assoc($resultado)){

      ?>
      

 <div class="col-md-12 col-md-offset-1">
 <ul class="media-list media-list-conversation">
<li class="media media-current-user m-b-md">
                <div class="media-body">
               
                <div class="media-body-text">
                  <h5> <b><?=$comentarios["admin"]?></b></h5>
                  </div>
                  <div class="media-body-text">
                   <?=$comentarios["pregunta"]?>
                  </div>
                  <div class="media-footer">
                    <small class="text-muted">
                      <a href="#"><?=$comentarios["fecha"]?>&nbsp;&nbsp;<?=substr($comentarios["hora"],0,-3)?></a>
                    </small>
                    
                  </div>
                </div>
                
              </li>
              </ul>


   
 </div>
   <?}?>
   
  </div>
  
  
  <div class="col-lg-8 col-md-offset-1">
    <label>responder comentario</label>
   <textarea  id="realizarc" class="form-control"></textarea>

  </div>

  <input type="hidden" id="idtarea" value="<?php echo $_POST["id"]?>">
  <input type="hidden" id="usuario" value="<?php echo $_SESSION["usuario"]?>">
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-success" onClick="validarcomentariost()">Agregar comentarios</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>


