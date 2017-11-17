<?php
include("../../includes/inc_conectoresi.php");
$registros=explode("|", $_POST["seleccionados"]);
$tabla=$_POST["tabla"];
$col = explode("|",$_POST["columnas"]);
$sql="SELECT a.id pregunta,a.idcurso,a.idcapitulo,a.texto,a.status,
b.id,b.nombre 
from preguntas a, capitulos b 
where  a.id=$registros[1] 
 and b.id=a.idcapitulo and a.status=1";
$resultado=mysqli_query($con,$sql);
$preguntas=mysqli_fetch_assoc($resultado);
?>

<div class="modal-header panel-heading bg-warning">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Pregunta</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
        <div class="form-group col-lg-6">
    <label>curso</label>
    <select id="campo0" class="form-control" onchange="actualizarcapitulo()">
    <?

$sql1="SELECT * from cursos where status=1";
$resultadocursos=mysqli_query($con,$sql1);
while ($filacursos=mysqli_fetch_assoc($resultadocursos)) {
  if($preguntas["idcurso"]==$filacursos["id"]){
    $sel="selected='selected'";
  }else{$sel="";}
  ?>
  <option value="<?=$filacursos["id"]?>" <?=$sel?> ><?=$filacursos["curso"]?></option>
  <?
}
    ?>   
    </select>

    
  </div>
            <div class="form-group col-lg-6">
           
    <label>Capitulo</label>
   <select id="campo1" class="form-control">
    <?

$sql2="SELECT * from capitulos where  status=1";
$resultadocapitulos=mysqli_query($con,$sql2);
while ($filacapitulo=mysqli_fetch_assoc($resultadocapitulos)) {
  if($preguntas["idcapitulo"]==$filacapitulo["id"]){
    $sel="selected='selected'";
  }else{$sel="";}
  ?>
  <option value="<?=$filacapitulo["id"]?>" <?=$sel?> ><?=$filacapitulo["nombre"]?></option>
  <?
}
    ?>   
    </select>
  </div>
  
  <div class="form-group col-lg-6">
    <label>pregunta</label>
    <input id="campo2" class="form-control " type="text" value="<?=$preguntas["texto"] ?>"/>
  </div>
 
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-warning" onClick="validarpreguntas(<?=$preguntas["pregunta"]?>)">Editar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
