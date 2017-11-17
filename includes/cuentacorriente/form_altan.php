<?php include("../../includes/inc_conectoresi.php");
$sql = "SELECT * from regalumnos where id=".$_POST["idalum"];
    $resultado= mysqli_query($con,$sql);
    $alumno=mysqli_fetch_assoc($resultado);

?>
<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta de Movimientos de cuenta <? echo $alumno["nombre"]?></h4>
        </div>
        <div class="modal-body ">
        <div class="row">
       
  
            <div class="form-group col-md-4">
    <label>Fecha</label>
    <input id="fecha" class="form-control " type="text" value="<?=date('Y-m-d')?>"/>
  </div>
   <div class="form-group col-md-4">
    <label>Concepto</label>
    <input id="concepto" class="form-control " type="text"/>
  </div>

    
    <input id="idalumno" class="form-control " type="hidden" value="<? echo $alumno["id"]?>" />

  <div class="form-group col-md-2">
    <label>Debe</label>
    <input id="debe" class="form-control " type="radio" name="tipo" value="debe" />
  </div>
  <div class="form-group col-md-2">
    <label>Haber</label>
    <input id="haber" class="form-control " type="radio" name="tipo" value="haber" />
  </div>
 <div class="form-group col-md-4">
    <label>Valor</label>
    <input id="valor" class="form-control " type="text"  />
  </div>
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-success" onClick="altacuentacorriente()">Alta</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
