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
                          Ingrese a la cuenta corriente del alumno
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

   

                    
                           
                       
                                
                                <div class="form-group input-group">
                                <input type="text" class="form-control col-md-12 col-xs-6" id="buscaralumno" onKeyUp="asistente_busquedadealumnos()" placeholder="buscar por alumno">
                               
                            </div>
                          
                                <div id="listadoalumno" ></div>
                           
                           
                        
                            
      
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