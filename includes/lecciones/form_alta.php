<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta de lecciones</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
            <div class="form-group col-lg-6">
    <label>curso</label>
   <select id="campo0" class="form-control" onchange="cargacapitulos()">
   <option value="0">seleccione curso</option>
    <?
include("../../includes/inc_conectores.php");
$sql="SELECT * from cursos where status=1";
$resultado=mysql_query($sql);
while ($fila=mysql_fetch_assoc($resultado)) {
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
    <?
include("../../includes/inc_conectores.php");
$sql="SELECT * from capitulos where status=1";
$resultado=mysql_query($sql);
while ($fila=mysql_fetch_assoc($resultado)) {
  ?>
  <option value="<?=$fila["id"]?>"><?=$fila["curso"]?></option>
  <?
}
    ?>   
    </select>
  </div>
  <div class="form-group col-lg-6">
    <label>titulo</label>
    <input id="campo2" class="form-control " type="text"/>
  </div>
  <div class="form-group col-lg-6">
    <label>copete</label>
    <input id="campo3" class="form-control" type="text"/>
  </div>
   <div class="form-group col-lg-12">
    <label>descripcion</label>
 <textarea id="campo4" class="form-control"></textarea>
  </div>
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-success" onClick="validarleccion(0)">Alta</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>



