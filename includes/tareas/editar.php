<?php
include("../../includes/inc_conectoresi.php");
$registros=explode("|", $_POST["seleccionados"]);
$tabla=$_POST["tabla"];
$col = explode("|",$_POST["columnas"]);
$sql="select * from tareas where id=".$registros[1];
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
      <label>Tareas</label>
      <input id="tarea" class="form-control " type="text" value="<?=$fila["nombre"]?>"/>
    </div>
    <div class="form-group col-lg-6">
      <label>Seleccion administrador</label>
      <select id="usuario" class="form-control">
        <?
        $sql="SELECT * from usuarios where status=1";
        $resultadoc=mysqli_query($con,$sql);
        while ($usuarios=mysqli_fetch_assoc($resultadoc)) {
        if($fila["idadmin"]==$usuarios["id"]){
        $sel="selected='selected'";
        }else{$sel="";}
        ?>
        <option value="<?=$usuarios["id"]?>" <?=$sel?> ><?=$usuarios["usuario"]?></option>
        <?
        }
        ?>
      </select>
     
    </div>
    <div class="form-group col-lg-6">
      <label>Fecha</label>
      <input id="fecha" class="form-control " type="text" value="<?=$fila["fechavenc"]?>"/>
    </div>
   
  </div>

</div>

<div class="modal-footer panel-heading bg-active">
  <button type="button" class="btn btn-warning" onClick="editandotareas(<?=$fila["id"]?>)">Editar</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>