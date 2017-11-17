<div class="modal-header panel-heading bg-success">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Alta de Tarea</h4>
</div>
<div class="modal-body ">
  <div class="row">
    <div class="form-group col-lg-6">
      <label>Tareas</label>
      <input id="tarea" class="form-control" type="text" name="tarea" />
    </div>
    <div class="form-group col-lg-6">
      <label>Seleccion administrador</label>
      <select  id="usuario" class="form-control" name="usuario">
        <option value="0">Seleccione Usuario</option>
        <?
        include("../../includes/inc_conectoresi.php");
        $sql="SELECT * from usuarios where status=1";
        $resultado=mysqli_query($con,$sql);
        while($usuarios=mysqli_fetch_assoc($resultado)){
        ?>
        <option value="<?=$usuarios["id"]?>"><?=$usuarios["usuario"]?></option>
        <?}?>
      </select>
    </div>
    
    
     <div class="col-lg-12 col-lg-offset-2">
      <div  class="col-lg-4 " id="calendario"></div>
      
      <div class="form-group col-lg-4">
      <label>Fecha</label>
      <input id="fecha" class="form-control" type="text" name="fecha"  />
    </div>
   
     <div class="col-lg-6" id="mañana"></div>

       <div class="col-lg-6" id="pasadomañana"></div>
</div>
  </div>



<div class="modal-footer panel-heading bg-active">
  <button type="button" class="btn btn-success" onClick="validartareas()">Agregar tarea</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>