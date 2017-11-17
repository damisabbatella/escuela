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
                           Alumnos
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

   

                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                                       <div class="row">
                            <div class="col-md-8">
                                <input type="text" id="buscar" onKeyUp="asistente_busqueda(0)"/>
                                <input type="button" value="Buscar por nombre" onClick="mostrar_listado()"/>
                                <input type="button" value="Mostrar todo" onClick="mostrar_todo()"/>
                                <div id="asistente"></div>
                            </div>
                            <div class="col-md-4">
                                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-home fa-plus"></i>Nuevo</button>
                                    <button class="btn btn-md btn-primary"><i class="fa fa-home fa-pencil"></i>Editar</button>
                                    <button class="btn btn-md btn-danger" onclick="borrar()"><i class="fa fa-home fa-ban"></i>Borrar</button>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

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

          <? include("includes/usuarios/form_alta.php") ?>
       
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
