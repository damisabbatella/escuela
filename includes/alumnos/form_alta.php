<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta de alumnos</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
            <div class="form-group col-lg-6">
    <label>nombre</label>
    <input id="campo0" class="form-control " type="text"/>
  </div>
  <div class="form-group col-lg-6">
    <label>apellido</label>
    <input id="campo1" class="form-control " type="text"/>
  </div>
   <div class="form-group col-lg-6">
    <label>email</label>
    <input id="campo2" class="form-control " type="text"/>
  </div>
  <div class="form-group col-lg-6">
    <label>pais</label>
 <select  id="campo3" class="form-control">
  <option value="0">Seleccione pais</option>
              <?
              include("../inc_conectoresi.php");
$sql="SELECT * from pais";
$resultado=mysqli_query($con,$sql);
while($paises=mysqli_fetch_assoc($resultado)){



         ?>



             
              <option value="<?=$paises["id"]?>"><?=$paises["paisnombre"]?></option>
              
            

<? } ?> 
</select>

  </div>
  <div class="form-group col-lg-6">
    <label>contraseña</label>
    <input id="campo4" class="form-control " type="password"/>
  </div>
  <div class="form-group col-lg-6">
    <label>repetir contraseña</label>
    <input id="campo4a" class="form-control" type="password"/>
  </div>
  
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-success" onClick="validaralumnos(0)">Alta</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>



