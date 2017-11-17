<?php
include("../../includes/inc_conectoresi.php");
$registros=explode("|", $_POST["seleccionados"]);
$tabla=$_POST["tabla"];
$col = explode("|",$_POST["columnas"]);
$sql="select * from grupo where id=".$registros[1];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);
?>
<div class="modal-header panel-heading bg-warning">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Editar Grupo</h4>
</div>
<div class="modal-body ">
  <div class="row">
   
      
      <div class="form-group col-lg-4">
        <label>nombre de Grupo</label>
        <input id="campo0" class="form-control " type="text" value="<?=$fila["nombre"] ?>"/>
      </div>
      <div class="form-group col-lg-4">
        <label>Curso</label>
        
        <input id="campo1" class="form-control " type="text" value="<?=$fila["idcurso"] ?>"/>
      </div>
      
       <div class="form-group col-lg-4">
        <label>Lunes</label>
        <input id="campo2" class="form-control " type="text" value="<?=$fila["lu"] ?>"/>
      </div>
       <div class="form-group col-lg-4">
        <label>Martes</label>
        <input id="campo3" class="form-control " type="text" value="<?=$fila["ma"] ?>"/>
      </div>
       <div class="form-group col-lg-4">
        <label>Miercoles</label>
        <input id="campo4" class="form-control " type="text" value="<?=$fila["mie"] ?>"/>
      </div>
       <div class="form-group col-lg-4">
        <label>Jueves</label>
        <input id="campo5" class="form-control " type="text" value="<?=$fila["jue"] ?>"/>
      </div>
       <div class="form-group col-lg-4">
        <label>Viernes</label>
        <input id="campo6" class="form-control " type="text" value="<?=$fila["vie"] ?>"/>
      </div>
       <div class="form-group col-lg-4">
        <label>Sabados</label>
        <input id="campo7" class="form-control " type="text" value="<?=$fila["sab"] ?>"/>
      </div>
       <div class="form-group col-lg-4">
        <label>Hora de inicio</label>
        <input id="campo8" class="form-control " type="text" value="<?=$fila["inicio"] ?>"/>
      </div>
       <div class="form-group col-lg-4">
        <label>Hora de finalizacion</label>
        <input id="campo9" class="form-control " type="text" value="<?=$fila["finaliza"] ?>"/>
      </div>
    </div>
  </div>
  <div class="modal-footer panel-heading bg-active">
    <button type="button" class="btn btn-warning" onClick="validarcapitulo(<?=$fila["id"]?>)">Editar</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
  </div>