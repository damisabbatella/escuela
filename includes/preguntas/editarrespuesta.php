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
          <h4 class="modal-title">Editar Capitulo</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
            <div class="form-group col-lg-6">
    <label>nombre</label>
    <input id="campo0" class="form-control " type="text" value="<?=$fila[$col[0]] ?>"/>
  </div>
  <div class="form-group col-lg-6">
    <label>curso</label>
    <select id="campo1" class="form-control">
    <?

$sql="SELECT * from cursos where status=1";
$resultadoc=mysqli_query($con,$sql);
while ($filac=mysqli_fetch_assoc($resultadoc)) {
  if($fila["idcurso"]==$filac["id"]){
    $sel="selected='selected'";
  }else{$sel="";}
  ?>
  <option value="<?=$filac["id"]?>" <?=$sel?> ><?=$filac["curso"]?></option>
  <?
}
    ?>   
    </select>

    
  </div>
  <div class="form-group col-lg-6">
    <label>descripcion</label>
    <input id="campo2" class="form-control " type="text" value="<?=$fila[$col[2]] ?>"/>
  </div>
 
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-warning" onClick="validarcapitulo(<?=$fila["id"]?>)">Editar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
