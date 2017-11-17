<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta de Movimientos de Caja</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
       
  
            <div class="form-group col-md-2">
    <label>Fecha</label>
    <input id="fecha" class="form-control " type="text" value="<?=date('Y-m-d')?>"/>
  </div>
   <div class="form-group col-md-2">
    <label>Descripcion</label>
    <input id="descripcion" class="form-control " type="text"/>
  </div>
  <div class="form-group col-md-2">
    <label>Salida</label>
    <input id="salida" class="form-control " type="radio" name="tipo" value="egreso" />
  </div>
  <div class="form-group col-md-2">
    <label>Entrada</label>
    <input id="ingreso" class="form-control " type="radio" name="tipo" value="ingreso" />
  </div>
 <div class="form-group col-md-2">
    <label>Valor</label>
    <input id="valor" class="form-control " type="text"  />
  </div>
  </div>
        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-success" onClick="altacaja(0)">Alta</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
