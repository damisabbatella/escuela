<?  include("../../includes/inc_conectoresi.php");?>
<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta de Grupo</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
       
  <form   method="post" id="formu" >
            <div class="form-group col-lg-4">
    <label>nombre de grupo</label>
    <input id="nombre" class="form-control " type="text"  />
  </div>
<div class="form-group col-md-4">
                  <label>cursos</label>
                  <select id="curso" class="form-control" >
                    <option value="0">Seleccione cursos</option>
                    <?
                    
                    $sql="SELECT * from cursos where status=1";
                    $resultado=mysqli_query($con,$sql);
                    while($cursos=mysqli_fetch_assoc($resultado)){
                    ?>
                    
                    
                    
                    <option value="<?=$cursos["id"]?>"><?=$cursos["curso"]?></option>
                    
                    
                    <? } ?>
                    
                    
                  </select>
                </div>

<div class="form-group col-md-4">
                  <label>Horario de inico</label>
                  <select  class="form-control" id="hi" >
                    <option value="0">Seleccione horario</option>
                    <?
         for($x=8;$x<=20;$x++){ 
         if($x<10){$hora="0".$x;}else{$hora=$x;}
                echo'<option value="'.$hora.":00".'">'.$hora.":00".'</option>'."\r\n\t\t";
                echo'<option value="'.$hora.":30".'">'.$hora.":30".'</option>'."\r\n\t\t";
         }
        ?>
                  </select>
                </div>
<div class="form-group col-md-4">
                  <label>Horario de finalizacion</label>
                  <select  class="form-control" id="hf" >
                    <option value="0">Seleccione horario</option>
                    <?
         for($x=10;$x<=22;$x++){ 
         if($x<10){$hora="0".$x;}else{$hora=$x;}
                echo'<option value="'.$hora.":00".'">'.$hora.":00".'</option>'."\r\n\t\t";
                echo'<option value="'.$hora.":30".'">'.$hora.":30".'</option>'."\r\n\t\t";
         }
        ?>
                  </select>
                </div>
<div class="col-lg-12">
    <div class="form-group col-lg-2">
    <label>LUN</label>
    <input id="lu" class="form-control" type="checkbox"   value="lu" />
  </div>
<div class="form-group col-lg-2">
    <label>MAR</label>
    <input id="ma" class="form-control" type="checkbox"  value="ma"     />
  </div>
  <div class="form-group col-lg-2">
    <label>MIE</label>
    <input id="mie" class="form-control" type="checkbox"  value="mie"    />
  </div>
  <div class="form-group col-lg-2">
    <label>JUE</label>
    <input id="jue" class="form-control" type="checkbox"   value="jue"   />
  </div>
  <div class="form-group col-lg-2">
    <label>VIE</label>
    <input id="vie" class="form-control" type="checkbox"  value="vie"     />
  </div>
  <div class="form-group col-lg-2">
    <label>SAB</label>
    <input id="sab" class="form-control" type="checkbox"    value="sab"  />
  </div>
  </div>
  </div>


        </div>
        <div class="modal-footer panel-heading bg-active">
          <button type="button" class="btn btn-success" onClick="agregargrupo()">Alta</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
</form>