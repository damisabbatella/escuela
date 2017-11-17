<?php
include("../inc_conectoresi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Curso[it] - Panel de Control</title>

    <!-- Bootstrap Core CSS -->
    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="index.html">Curso[it]</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav" id="nuevosmensajes">

            <?
            $sql="SELECT * from consultas where estado='enviado'";
$resultado=mysqli_query($con,$sql);
$nmensajes=mysqli_num_rows($resultado);
?>
           <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b> <?=$nmensajes?> mensajes</a>
                    <ul class="dropdown-menu message-dropdown">
                                 <?
        

while($fila=mysqli_fetch_assoc($resultado)){


            ?>
                
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                   
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?=$fila["nombre"]?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?=$fila["fecha"]?> a las <?=$fila["hora"]?></p>
                                        <p><?=$fila["consulta"]?></p>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Edgardo Villafañe <b class="caret"></b></a>
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
                        <a href="../../cursos.php"><i class="fa fa-fw fa-bar-chart-o"></i> Cursos</a>
                    </li>
                    <li>
                        <a href="../../capitulos.php"><i class="fa fa-fw fa-table"></i> Capitulos</a>
                    </li>
                    <li>
                        <a href="../../lecciones.php"><i class="fa fa-fw fa-edit"></i> Lecciones</a>
                    </li>
                    <li>
                        <a href="../../pruevas.php"><i class="fa fa-fw fa-desktop"></i>Pruebas </a>
                    </li>
                    <li>
                        <a href="../../alumnos.php"><i class="fa fa-fw fa-wrench"></i> Alumnos</a>
                    </li>
                    <li>
                        <a href="../../tareas.php"><i class="fa fa-fw fa-wrench"></i> Tareas</a>
                    </li>
                    <li>
                        <a href="../../usuarios.php"><i class="fa fa-fw fa-users"></i> Usuarios</a>
                    </li>
                    <li>
                        <a href="../../preguntas.php"><i class="fa fa-fw fa-wrench"></i> Preguntas</a>
                    </li>
                    <li>
                        <a href="../../consultas.php"><i class="fa fa-fw fa-wrench"></i> Consultas</a>
                    </li>
                    <li>
                        <a href="../../comentarios.php"><i class="fa fa-fw fa-wrench"></i> Comentarios</a>
                    </li>
                    <li>
                        <a href="../../recursos.php"><i class="fa fa-fw fa-wrench"></i> Recursos</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Desplegables <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Item 1</a>
                            </li>
                            <li>
                                <a href="#">Item 2</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../../backup.php"><i class="fa fa-fw fa-file"></i> Backup</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i>Salir</a>
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
                          Editar  leccion
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

   


                </div>
                <!-- /.row -->
 <?

$sql="SELECT * from lecciones where id=".$_GET["idleccion"];
$resultado=mysqli_query($con,$sql);
$leccion=mysqli_fetch_assoc($resultado);
?>
               <div class="row">


                    <div class="col-lg-12">
                        
    
    

<form id="miFormulario"  method="POST"  action="editandoleccion.php?idleccion=<?=$leccion["id"]?>">

    <div id="formulario">
        <div class="form-group">
            <label>Titulo</label>
            <input name="datos0" class="form-control" id="campo0" type="text" value="<?=$leccion["titulo"] ?>"/>
        </div>
        <div class="form-group">
            <label>copete</label>
            <input name="datos1" class="form-control" id="campo1" type="text" value="<?=$leccion["copete"]?>"/>
        </div>
        
        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="datos2" class="form-control" id="campo2" type="text">
               
<?=$leccion["descripcion"]?>

            </textarea>
        </div>
           <div class="form-group">
            <label>cursos</label>
  <select id="campo3" class="form-control" name="datos3" onchange="cargacapitulosl()">
  
               <?
              
$sql1="SELECT * from cursos where status=1";
$resultado1=mysqli_query($con,$sql1);
while($cursos=mysqli_fetch_assoc($resultado1)){
    if($leccion["idcurso"]==$cursos["id"]){

  $sel="selected='selected'";


    }else{$sel="";}
?>
<option value="<?=$cursos["id"]?>"<?=$sel?>><?=$cursos["curso"]?></option>


<?}
                    ?> 
           
        
            </select>
        </div>
       <div class="form-group">
            <label>capitulos</label>
            <select name="datos4" class="form-control" id="campo4">
            <?
            $sql2="SELECT * from capitulos where status=1";
$resultado2=mysqli_query($con,$sql2);


while($capitulos=mysqli_fetch_assoc($resultado2)){
    if($leccion["idcurso"]==$capitulos["idcursosc"]){
$sel="selected='selected'";

    }else{$sel="";}
    
?>
<option value="<?=$capitulos["id"]?>"<?=$sel?>><?=$capitulos["nombre"]?></option>



<?
}
?>
            </select>
          
        </div>
        
        
        
    </div>


    <button type="button" value="Aceptar" class="btn btn-default" onClick="validarleccion(<?=$leccion["id"]?>)">Aceptar</button>
    
</form>
<script>tinymce.init({
 
  selector: 'textarea',
  remove_linebreaks: false,
  height: 250,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});</script>
</div>
</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <input type="hidden" value="idcurso|idcapitulo|titulo|copete|descripcion" id="columnas"/>
      
        <input type="hidden" value="lecciones" id="tabla"/>
        <input id="paso" type="hidden" value="10"/>
        <input id="pagina" type="hidden" value="1"/>
<input type="hidden" id="mostrarlistado" value="3" />

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        
       
      </div>
      
    </div>
  </div>
  
</div>

 <!-- jQuery -->
  <script src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/funciones.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>
