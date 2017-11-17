<?
session_start();
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
           <? include("includes/inc_nav.php"); ?>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b> <?=$nmensajes?>consultas</a>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="imagenp" src="../../fotos/portfolio/<?php echo $imagen ?>"><b class="caret"></b>HOLA &nbsp;<?php echo $_SESSION["admin"];?></b> </a>
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
                        Editar  Usuario
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.row -->
            <?php
            $sql="SELECT * from usuarios where id=".$_GET["idusuario"];
            $resultado=mysqli_query($con,$sql);
            $fila=mysqli_fetch_assoc($resultado)
            ?>
            <div class="row">
                <div class="col-lg-12">
                    
                    
                    
                    <form id="miFormulario"  method="POST" enctype="multipart/form-data" action="editarusuario.php?id=<?=$fila["id"]?>"  >
                        <div id="formulario">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input name="datos0" class="form-control" id="campo0" type="text" value="<?=$fila["admin"] ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="datos1" class="form-control" id="campo1" type="text" value="<?=$fila["email"]?>"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input  name="datos2" class="form-control" id="campo2" type="password" value="<?=$fila["contrasena"]?>"/>
                                
                                
                            </div>
                            
                            <!-- FOTO DE PORTADA -->
                            <div class="form-group">
                                
                                <label>Imagen</label>
                                
                                
                                <div>
                                    <?
                                    $imagen=($fila["foto"]!="")?$fila["foto"]:"sinimagen.jpg";
                                    ?>
                                    <img id="imageneditar" class="img-thumbnail col-lg-1"  src="../../fotos/portfolio/<?=$imagen?>">
                                    <input name="foto_perfil" class="form-control" id="campo3"   type="file" onchange="document.getElementById('imageneditar').style.display='none'" />
                                </div>
                                
                            </div>
                            
                        </div>
                        <button type="button" value="Aceptar" class="btn btn-default" onClick="validarusuario(<?=$fila["id"]?>)">Aceptar</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<input type="hidden" value="admin|email|contrasena|imagen" id="columnas"/>

<input type="hidden" value="usuarios" id="tabla"/>
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