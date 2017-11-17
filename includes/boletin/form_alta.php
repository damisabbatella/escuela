<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta de Usuario</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
        <form id="miFormulario" action="includes/altausuario.php" method="POST" enctype="multipart/form-data">
            <div class="form-group col-lg-6">
    <label>usuario</label>
    <input id="campo0" class="form-control " type="text"/>
  </div>
      <div class="form-group col-lg-6">
    <label>email</label>
    <input id="campo1" class="form-control " type="text"/>
  </div>
 
  <div class="form-group col-lg-6">
    <label>contraseña</label>
    <input id="campo2" class="form-control " type="password"/>
  </div>
  <div class="form-group col-lg-6">
    <label>repetir contraseña</label>
    <input id="campo2a" class="form-control" type="password"/>
  </div>
  <div class="form-group col-lg-6">
    <label>Foto</label>
    <input id="campo3" class="form-control"  type="file" name="foto_perfil" />
  </div>
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-success" onClick="validarusuario(0)">Alta</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>



