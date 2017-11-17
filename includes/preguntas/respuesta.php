<?php
include("../../includes/inc_conectoresi.php");

$tabla=$_POST["tabla"];
$col = explode("|",$_POST["columnas"]);
$sql="select * from $tabla where id=".$_POST["seleccionados"];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);
?>

<div class="modal-header panel-heading bg-warning">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Respuestas</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
          
  
  <div class="form-group col-lg-12">
    <label>Pregunta</label>
    <h3><?=$fila[$col[2]] ?></h3>
  </div>
<div id="listadorespuestas"></div>
  <a href="#" id="linkagregar" class="btn btn-link pull-right" onclick="agregarrespuesta()">Agregar respuesta</a>
  <div id="ingresarrespuesta" class="form-group" style="display:none;">
    
<div class="form-group col-lg-6"><input type="text" class="form-control" id="textor"/></div>
<div class="form-group col-lg-4"><button type="button" class="btn btn-default" onclick="guardarrespuesta(<?=$fila["id"] ?>)">Guardar</button></div>



  </div>
  </div>
        </div>

        <div class="modal-footer panel-heading bg-active">
         
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
