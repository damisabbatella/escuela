<?php
include("../../includes/inc_conectoresi.php");
$registros=explode("|", $_POST["seleccionados"]);
$tabla=$_POST["tabla"];
$col = explode("|",$_POST["columnas"]);
$sql="select * from $tabla where id=".$registros[1];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);
?>

<div class="modal-header panel-heading bg-warning">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Usuario</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
            <div class="form-group col-lg-6">
    <label>usuario</label>
    <input id="campo0" class="form-control " type="text" value="<?=$fila[$col[0]] ?>"/>
  </div>
  <div class="form-group col-lg-6">
    <label>email</label>
    <input id="campo1" class="form-control " type="text" value="<?=$fila[$col[1]] ?>"/>
  </div>
  <div class="form-group col-lg-6">
    <label>contraseña</label>
    <input id="campo2" class="form-control " type="password"/>
  </div>
  <div class="form-group col-lg-6">
    <label>repetir contraseña</label>
    <input id="campo2a" class="form-control" type="password"/>
  </div>
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-warning" onClick="validarusuario(<?=$fila["id"]?>)">Editar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
