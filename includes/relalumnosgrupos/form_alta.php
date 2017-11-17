<?  include("../../includes/inc_conectoresi.php");?>
<div class="modal-header panel-heading bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alta de Inscriptos</h4>
        </div>
        <div class="modal-body ">
        <div class="row">
       
 
         
<div class="form-group col-md-4">
                  <label>cursos</label>
                  <select id="curso" name="curso" class="form-control"  onchange="cargargrupo()">
                    <option value="0">Seleccione cursos</option>

                    <?
                
                    $sql="SELECT * from cursos where status=1";
                    $resultado=mysqli_query($con,$sql);
                    while($cursos=mysqli_fetch_assoc($resultado)){
                  
                    
                    
                   ?> 
                    <option value="<?=$cursos["id"]?>"><?=$cursos["curso"]?></option>
                     
                    
                   


                 <? }?>
 <input type="hidden" id="idcurso" value="<?=$cursos["id"]?>">
                 

                  
                  

                    
                    
                    
                  </select>
                   
                </div>

<div class="form-group col-md-4">
                  <label>Grupo</label>
                  <select id="grupo" name="grupo" class="form-control" onchange="agregarinscriptos()" disabled="disabled" >
              
                    

                   
                    
                    
                  </select>
            
                </div>
              


                <div class="col-md-12" id="inscriptos">
                  




                </div>

  </div>
  </div>


        </div>
        <div class="modal-footer panel-heading bg-active">
          
        </div>
