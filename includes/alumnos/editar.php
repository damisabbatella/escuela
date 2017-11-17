<?php
include("../../includes/inc_conectores.php");
$registros=explode("|", $_POST["seleccionados"]);
$tabla=$_POST["tabla"];
$col = explode("|",$_POST["columnas"]);
$sql="select * from $tabla where id=".$registros[1];
$resultado=mysql_query($sql);
$fila=mysql_fetch_assoc($resultado);
?>

<div class="modal-header panel-heading bg-warning">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar alumnos</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
            <div class="form-group col-lg-6">
    <label>nombre</label>
    <input id="campo0" class="form-control " type="text" value="<?=$fila[$col[0]] ?>"/>
  </div>
  <div class="form-group col-lg-6">
    <label>apellido</label>
    <input id="campo1" class="form-control " type="text" value="<?=$fila[$col[1]] ?>"/>
  </div>
  <div class="form-group col-lg-6">
    <label>email</label>
    <input id="campo2" class="form-control " type="text" value="<?=$fila[$col[2]] ?>"/>
  </div>
  <div class="form-group col-lg-6">
    <label>pais</label>
    <select id=campo3 class="form-control">
    <?
$sql="SELECT * from pais";
$resultado=mysql_query($sql);
while ($filaca=mysql_fetch_assoc($resultado)) {
  
  $sel=($filaca["id"]==$fila[$col[3]])?"selected=selected":"";
  ?>

  <option value="<?=$filaca["id"]?>" <?=$sel?>><?=$filaca["paisnombre"]?></option>
  <?
}
    ?>
</select>

  </div>
  <div class="form-group col-lg-6">
    <label>contraseña</label>
    <input id="campo4" class="form-control " type="password" />
  </div>
  <div class="form-group col-lg-6">
    <label>repetir contraseña</label>
    <input id="campo4a" class="form-control" type="password"/>
  </div>
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-warning" onClick="validaralumnos(<?=$fila["id"]?>)">Editar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
