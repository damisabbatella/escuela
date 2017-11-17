<?
 session_start();
if (isset($_SESSION['admin'])){ 

 include("inc_conectoresi.php");

 



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
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
          
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Cambiar Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">INSTITUTO BRIENZA[IFPB]</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav" id="nuevosmensajes">
                    <?
                   
                    $sql="SELECT * from boletin where status=1";
                    $resultado=mysqli_query($con,$sql);
                    $nmensajes=mysqli_num_rows($resultado);
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b> <?=$nmensajes?>&nbsp;consultas</a>
                        <ul class="dropdown-menu message-dropdown">
                            <?
                            
                            while($fila=mysqli_fetch_assoc($resultado)){
                            ?>
                            
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong><?=$fila["contacto"]?></strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> <?=$fila["fecha"]?> a las <?=$fila["hora"]?></p>
                                            <p><?=$fila["mensaje"]?></p>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-md btn-success" onClick="tuconsulta(<?=$fila["id"]?>)">Tu consulta</button>
                                </a>
                            </li>
                            
                            
                            <?}?>
                            
                            <input type="hidden" id="cantmensajes" value="<?=$nmensajes?>">
                        </ul>
                    </li>
                    
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Notificacion <span class="label label-default">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Notificacion <span class="label label-primary">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Notificacion <span class="label label-success">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Notificacion <span class="label label-info">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Notificacion <span class="label label-warning">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Notificacion <span class="label label-danger">Alert Badge</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <style>
                    
                    .imagenp{
                    webkit-background-size: 25px 25px;
                    background-size: 25px 25px;
                    -webkit-border-radius: 50%;
                    border-radius: 50%;
                    
                    
                    
                    height: 25px;
                    width: 25px;
                    
                    margin-left:-2px;
                    }
                    </style>
                    <?
                    $sqlf="SELECT * from usuarios where id=".$_SESSION['idusuario'];
                    $resultado=mysqli_query($con,$sqlf);
                    $filaf=mysqli_fetch_assoc($resultado);
                    $imagen=($filaf["foto"]!="")?$filaf["foto"]:"sinimagen.jpg";
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="imagenp" src="fotos/portfolio/<?php echo $imagen ?>"><b class="caret"></b>HOLA &nbsp;<?php echo $_SESSION["admin"];?></b> </a>
                    </li>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Bandeja Entrada</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="salir.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Panel</a>
                    </li>
                    
                    <li>
                        <a href="usuarios.php"><i class="fa fa-fw fa-users"></i> Usuarios</a>
                    </li>
                    
                    <li>
                        <a href="boletin.php"><i class="fa fa-fw fa-users"></i> Newsletter</a>
                    </li>
                     <li>
                        <a href="cursos.php"><i class="fa fa-fw fa-users"></i> Curso</a>
                    </li>
                   
                     <li>
                        <a href="regalumnos.php"><i class="fa fa-fw fa-users"></i> Alumnos</a>
                    </li>
                     <li>
                        <a href="inscripciones.php"><i class="fa fa-fw fa-users"></i>Inscripcion de alumnos</a>
                    </li>
                     <li>
                        <a href="grupo.php"><i class="fa fa-fw fa-users"></i>Grupos</a>
                    </li>
                    <li>
                        <a href="backup.php"><i class="fa fa-fw fa-file"></i> Backup</a>
                    </li>
                    <li>
                        <a href="salir.php"><i class="fa fa-fw fa-dashboard"></i>Salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Editar  Alumnos
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.row -->
            <?php
            $sql="SELECT * from regalumnos where id=".$_GET["alumno"]." and status=1";
            $resultado=mysqli_query($con,$sql);
            $fila=mysqli_fetch_assoc($resultado)
            ?>
            <div class="row">
                <div class="col-lg-12">
                    
                    
                    
                    <form id="miFormulario"  method="POST" enctype="multipart/form-data" action="includes/regalumnos/editaralum.php?idalumno=<?=$fila["id"]?>"  >
                        <div id="formulario">
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
                
                
                <!-- FOTO DE PORTADA -->
                <div class="col-md-4">
                   <div class="form-group">
                                
                                <label>Foto</label>
                                
                                
                                <div>
                                    <?
                                    $imagen=($fila["fotoperfil"]!="")?$fila["fotoperfil"]:"sinimagen.jpg";
                                    ?>
                                    <img id="imageneditar" class="img-thumbnail col-md-4 col-xs-4"  src="fotos/portfolio/<?=$imagen?>">
                                    <input name="foto_alumno" class="form-control" id="foto_alumno"   type="file" onchange="document.getElementById('imageneditar').style.display='none'" />
                                </div>
                                
                            </div>
                </div>
                
               
                <div class="form-group col-md-4">
                <button type="button" value="Aceptar" class="btn btn-default" onClick="editandoalum(<?=$fila["id"]?>)">Aceptar</button></div>
                
                        
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<input type="hidden" value="nombre|apellido|fotoperfil|email|direccion|idprovincia|idlocalidad|edad|dni|estado|fecha|fechanac|recomendaciones|idcurso|telefono|tellaboral|nacionalidad|estudios" id="columnas"/>

<input type="hidden" value="regalumnos" id="tabla"/>
<input id="paso" type="hidden" value="10"/>
<input id="pagina" type="hidden" value="1"/>
<input type="hidden" id="mostrarlistado" value="0" />
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            
            
        </div>
        
    </div>
</div>

</div>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?}else{


header("location:index.php?error=1");


    }?>