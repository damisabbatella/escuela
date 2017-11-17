<div class="modal-header panel-heading bg-success">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title"></h4>
</div>
<div class="modal-body ">
  
   



 <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
               
                <!-- /.row -->
                
            </div>
            <!-- /.row -->
          <?
 include("../../includes/inc_conectoresi.php");
    $sql="SELECT * from regalumnos where id=".$_POST["idalumno"]." and status=1";
    $resultado=mysqli_query($con,$sql);
    $fila=mysqli_fetch_assoc($resultado);
    ?>
            <div class="row">
                <div class="col-lg-12">
                    
                    
                    
                    <form id="miFormulario"  method="POST" enctype="multipart/form-data"   >
                        <div id="formulario">

 <!-- FOTO DE PORTADA -->
                <div class="col-md-4">
                   <div class="form-group">
                                
                                <label>Foto Alumno</label>
                                
                                
                                <div>
                                    <?
                                    $imagen=($fila["fotoperfil"]!="")?$fila["fotoperfil"]:"sinimagen.jpg";
                                    ?>
                                    <img id="imageneditar" class="img-thumbnail col-md-6 col-xs-4"  src="fotos/portfolio/<?=$imagen?>">
                                    
                                </div>
                                
                            </div>
                </div>

                           <div class="form-group col-md-4">
                  <label>Fecha de Inscripcion</label>
                  <input id="fecha" class="form-control" type="text" name="fecha" value="<?=$fila["fecha"]?>"  />
                </div>
                
                
                <div class="form-group col-md-4">
                  <label>Nombre</label>
                  <input name="nombre" class="form-control" id="nombre" type="text" value="<?=$fila["nombre"]?>"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Apellido</label>
                  <input name="apellido" class="form-control" id="apellido" type="text" value="<?=$fila["apellido"]?>"/>
                </div>
               
                
                
                <div class="form-group col-md-4">
                  <label>Estudios cursados</label>
                  <input name="estudios" class="form-control" id="estudios" type="text" value="<?=$fila["estudios"]?>"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Direccion</label>
                  <input name="direccion" class="form-control" id="direccion" type="text" value="<?=$fila["direccion"]?>"/>
                </div>
                
                <div class="form-group col-md-4">
                  <label>cursos</label>
                  <select id="curso" class="form-control" name="curso">
                    <option value="0">Seleccione cursos</option>
                    <?
                    
                    $sql="SELECT * from cursos where status=1";
                    $resultado=mysqli_query($con,$sql);
                    while($cursos=mysqli_fetch_assoc($resultado)){
                    if($fila["idcurso"]==$cursos["id"]){

  $sel="selected='selected'";


    }else{$sel="";}
?>
<option value="<?=$cursos["id"]?>"<?=$sel?>><?=$cursos["curso"]?></option>


<?}
                    ?> 
                    
                    
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Otro curso</label>
                  <select id="curso1" class="form-control" name="curso1">
                    <option value="0">Seleccione cursos</option>
                    <?
                    
                    $sql="SELECT * from cursos where status=1";
                    $resultado=mysqli_query($con,$sql);
                    while($cursosn=mysqli_fetch_assoc($resultado)){
                 if($fila["id_curso"]==$cursosn["id"]){

  $sel="selected='selected'";


    }else{$sel="";}
?>
<option value="<?=$cursosn["id"]?>"<?=$sel?>><?=$cursosn["curso"]?></option>


<?}
                    ?> 
                    
                    
                  </select>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Provincia</label>
                  <select id="provincia" class="form-control" name="provincia" onchange="cargalocalidad()">
                    <option value="0">Seleccione provincia</option>
                    <?
                    
                    $sql="SELECT * from provincias where status=0";
                    $resultado=mysqli_query($con,$sql);
                    while($provincias=mysqli_fetch_assoc($resultado)){
                    if($fila["idprovincia"]==$provincias["id"]){
$sel="selected='selected'";

    }else{$sel="";}
    
?>
<option value="<?=$provincias["id"]?>"<?=$sel?>><?=$provincias["provincia"]?></option>



<?
}
?>
                    
                    
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Localidad</label>

                  <select id="localidad" class="form-control" name="localidad">
                    <option value="0">Seleccione provincia</option>
                    <?
                    
                    $sql1="SELECT * from localidades where status=0";
                    $resultado1=mysqli_query($con,$sql1);
                    while($localidades=mysqli_fetch_assoc($resultado1)){
                    if($fila["idlocalidad"]==$localidades["id"]){
$sel="selected='selected'";

    }else{$sel="";}
    
?>
<option value="<?=$localidades["id"]?>"<?=$sel?>><?=$localidades["localidad"]?></option>



<?
}
?>


                    
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Telefono o celular</label>
                  <input name="telefono" class="form-control" id="telefono" type="text" value="<?=$fila["telefono"]?>"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Telefono del trabajo</label>
                  <input name="telefonot" class="form-control" id="telefonot" type="text" value="<?=$fila["tellaboral"]?>"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Fecha de Nacimiento</label>
                  <input name="fechanac" class="form-control" id="fechanac" type="text" value="<?=$fila["fechanac"]?>"/>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Edad</label>
                  <input name="edad" class="form-control" id="edad" type="text" value="<?=$fila["edad"]?>"/>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Dni</label>
                  <input name="dni" class="form-control" id="dni" type="text" value="<?=$fila["dni"]?>"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Nacionalidad</label>
                  <input name="nacionalidad" class="form-control" id="nacionalidad" type="text" value="<?=$fila["nacionalidad"]?>"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Estado civil</label>
                  <input name="estado" class="form-control" id="estado" type="text" value="<?=$fila["estado"]?>"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input name="email" class="form-control" id="email" type="text" value="<?=$fila["email"]?>"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Como se entero</label>
                  <input name="conocimiento" class="form-control" id="conocimiento" type="text" value="<?=$fila["recomendaciones"]?>"/>
                </div>
                
                
               
                
               
               
                
                        
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>