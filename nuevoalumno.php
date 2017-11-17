<?php
 session_start();
if (isset($_SESSION['admin'])){ 



 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IFPB - Panel de Control</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    </style>
  </head>
  <body>
    <div id="wrapper">
      <? include("includes/inc_nav.php") ?>
      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
              Nuevo Alumno
              </h1>
              
            </div>
          </div>
          <!-- /.row -->
          
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            
            <?include("inc_conectoresi.php");?>
            
            <form id="miFormulario" action="includes/altaalumnos.php" method="POST" enctype="multipart/form-data">
              <div id="formulario">
                
                
                
                <div class="form-group col-md-4">
                  <label>Fecha de Inscripcion</label>
                  <input id="fecha" class="form-control" type="text" name="fecha"  />
                </div>
                <div class="col-md-4">
                  
                  <button type="button" value="Aceptar" class="btn btn-info calend" onClick="vercalendario()">ver calendario de inscripcion</button>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Nombre</label>
                  <input name="nombre" class="form-control" id="nombre" type="text"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Apellido</label>
                  <input name="apellido" class="form-control" id="apellido" type="text"/>
                </div>
               
                
                
                <div class="form-group col-md-4">
                  <label>Estudios cursados</label>
                  <input name="estudios" class="form-control" id="estudios" type="text"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Direccion</label>
                  <input name="direccion" class="form-control" id="direccion" type="text"/>
                </div>
                
                <div class="form-group col-md-4">
                  <label>cursos</label>
                  <select id="curso" class="form-control" name="curso">
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
                  <label>Otro curso</label>
                  <select id="curso1" class="form-control" name="curso1">
                    <option value="0">Seleccione cursos</option>
                    <?
                    
                    $sql="SELECT * from cursos where status=1";
                    $resultado=mysqli_query($con,$sql);
                    while($cursosn=mysqli_fetch_assoc($resultado)){
                    ?>
                    
                    
                    
                    <option value="<?=$cursosn["id"]?>"><?=$cursosn["curso"]?></option>
                    
                    
                    <? } ?>
                    
                    
                  </select>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Provincia</label>
                  <select id="provincia" class="form-control" name="provincia"  onchange="cargalocalidad()">
                    <option value="0">Seleccione provincia</option>
                    <?
                    
                    $sql="SELECT * from provincias where status=0";
                    $resultado=mysqli_query($con,$sql);
                    while($provincias=mysqli_fetch_assoc($resultado)){
                    ?>
                    
                    
                    
                    <option value="<?=$provincias["id"]?>"><?=$provincias["provincia"]?></option>
                    
                    
                    <? } ?>
                    
                    
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Localidad</label>
                  <select  class="form-control" id="localidad" name="localidad" disabled="disabled">
                    <option value="0">Seleccione localidad</option>
                    
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Telefono o celular</label>
                  <input name="telefono" class="form-control" id="telefono" type="text"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Telefono del trabajo</label>
                  <input name="telefonot" class="form-control" id="telefonot" type="text"/>
                </div>
            
                  
            

 <div class="form-group col-md-4">
                  <label>Fecha de Nacimiento</label>
                  <select  class="form-control" id="nac" name="nac">
                    <option value="0">Seleccione Dia</option>
                    <?
         for($x=1;$x<32;$x++){ 
         if($x<10){$dia="0".$x;}else{$dia=$x;}
                echo'<option value="'.$dia.'">'.$dia.'</option>'."\r\n\t\t";
         }
        ?>
                  </select>
                </div>
<div class="form-group col-md-4">
                  <label>Mes</label>
                  <select  class="form-control" id="mes" name="mes" >
                    <option value="0">Mes</option>
                         <?
        $meses=array("","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");   
         for($x=1;$x<13;$x++){ 
         if($x<10){$mes="0".$x;}else{$mes=$x;}
                echo'<option value="'.$mes.'">'.$meses[$x].'</option>'."\r\n\t\t";
         }
        ?>
                  </select>
                </div>
<div class="form-group col-md-4">
                  <label>Año</label>
                  <select  class="form-control" id="ano" name="ano">
                    <option value="0">Seleccione año</option>
                          <? 
        $anoactual=date ("Y");
        $anoinicio=$anoactual-120;
        for($x=$anoactual;$x>=$anoinicio;$x--){
          echo'<option value="'.$x.'">'.$x.'</option>'."\r\n\t\t";
          
          
          }
        
        ?>
                  </select>
                </div>
               
                <input name="fechanac" class="form-control" id="fechanac" type="hidden"/>
                <div class="form-group col-md-4">
                  <label>Edad</label>
                  <input name="edad" class="form-control" id="edad" type="text"/>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Dni</label>
                  <input name="dni" class="form-control" id="dni" type="text"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Nacionalidad</label>
                  <input name="nacionalidad" class="form-control" id="nacionalidad" type="text"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Estado civil</label>
                  <input name="estado" class="form-control" id="estado" type="text"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Email</label>
                  <input name="email" class="form-control" id="email" type="text"/>
                </div>
                <div class="form-group col-md-4">
                  <label>Como se entero</label>
                  <input name="conocimiento" class="form-control" id="conocimiento" type="text"/>
                </div>
                
                
                <!-- FOTO DE PORTADA -->
                <div class="col-md-4">
                  <label>Imagen</label>
                  <input name="foto_alumno"  id="fotoalumno" type="file"/>
                </div>
                
                <div class="col-md-10 col-md-offset-2">
                  
                
                  
                  <div class="col-md-6 cuadrocalend"  id="calendario"></div>
                  
                </div>
                <div class="form-group col-md-4">
                <button type="button" value="Aceptar" class="btn btn-default" onClick="validaralum(0)">Aceptar</button></div>
                
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
          
          
        </div>
        
      </div>
    </div>
    
  </div>
  <input id="mesoculto" type="hidden" />
  <input id="anooculto" type="hidden" />

   <input id="tabla" type="hidden" value="regalumnos" />
   <input id="filas" type="hidden" value="" />
     <input id="paso" type="hidden" value="10" />
      <input id="pagina" type="hidden" value="1" />
      <input type="hidden" value="nombre|apellido|fotoperfil|email|direccion|idprovincia|idlocalidad|edad|dni|estado|fecha|fechanac|recomendaciones|idcurso|telefono|tellaboral|nacionalidad|estudios" id="columnas"/>

  <input id="buscar" type="hidden" value="" />
  <!-- jQuery -->
  <script src="js/jquery.js"></script>
  
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <!--<script src="js/push.js"></script>-->
  <script type="text/javascript" src="js/funciones.js"></script>
  
  
</body>
</html>
<?}else{


header("location:index.php?error=1");


    }?>