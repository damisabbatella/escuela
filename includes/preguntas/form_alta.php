<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta de Preguntas</h4>
        </div>

        <div class="modal-body ">
        <div class="row">
            <div class="form-group col-lg-6">
    <label>curso</label>

    <select id="campo0" class="form-control" onchange="cargacapitulosp()">
    <option>Seleccione curso</option>
    <?
include("../../includes/inc_conectoresi.php");
$sql="SELECT * from cursos where status=1";
$resultado=mysqli_query($con,$sql);
while ($fila=mysqli_fetch_assoc($resultado)) {
  ?>
  <option value="<?=$fila["id"]?>"><?=$fila["curso"]?></option>
  <?
}
    ?>   
    </select>
  </div>
  <div class="form-group col-lg-6">
    <label>capitulo</label>
    
    <select id="campo1" class="form-control" disabled="disabled">

    </select>
  </div>
  <div class="form-group col-lg-12">
    <label>Pregunta</label>
<textarea  class="form-control" id ="campo2"></textarea>
    
  </div>
  
  
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-success" onClick="validarpreguntas(0)">Alta</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>



