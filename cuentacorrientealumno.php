<?php

 session_start();
if(isset($_SESSION['admin'])){ 



 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Panel de Control</title>

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
    
#nuevamodal{
    width:80% !important;


}


</style>
</head> 

<body>

    <div id="wrapper">

<? include("includes/inc_nav.php") ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                    <?
            include("inc_conectoresi.php");
$sql = "SELECT * from regalumnos where id=".$_GET["idalumno"];
    $resultado= mysqli_query($con,$sql);
    $alumno=mysqli_fetch_assoc($resultado);
    ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                       Cuenta corriente del Alumno:&nbsp;<b><?php echo $alumno["nombre"];?></b>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

   

                    <div class="col-lg-12">
                        <div class="panel panel-default" id="listartodos">
                            <div class="panel-heading">
                                                       <div class="row form-inline">
                            <div class="col-lg-8 form-group">
                       
                                
                                <div class="form-group input-group">
                                <input type="text" class="form-control col-lg-8 col-xs-6" id="buscar" onKeyUp="asistente_busqueda(0)" placeholder="buscar por nombre">
                                <span class="input-group-btn"><button class="btn btn-default" type="button" onClick="mostrar_listado2()"><i class="fa fa-search"></i></button></span>
                            </div>
                          
                                <div id="asistente"></div>
                            </div>
                            <div class="col-md-4">
                                 <button class="btn btn-md btn-success" onclick="nuevacuentacorrientealumno(<?php echo $alumno["id"];?>) "><i class="fa fa-home fa-plus"></i>Nuevo</button>
                                    
                            </div>
                        </div>
                        <input type="text" id="idalumno" value="<?php echo $alumno["id"];?>">
                            </div>
                            <div class="panel-body ">
                                <div class="table-responsive ">
                                    <table class="table table-bordered table-hover table-striped col-lg-6">
                                        <thead>
                                            <tr>
                                                  
                                                <th>Fecha</th>
                                                <th>Alumno</th>
                                                <th>Concepto</th>
                                                <th>Debe</th>
                                                <th>Haber</th>
                                                
                                                  
                                            
                                            </tr>
                                        </thead>
                                        <tbody id="filas">
                                           
                                        </tbody>
                                    </table>
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
<input type="hidden" id="mostrarlistado" value="2" />
<input type="hidden" value="fecha|idalumno|concepto|debe|haber" id="columnas"/>
        <input type="hidden" value="cuentacorriente" id="tabla"/>
        <input id="paso" type="hidden" value="10"/>
        <input id="pagina" type="hidden" value="1"/>

<div class="modal fade" id="ventananuevo" role="dialog">
    <div class="modal-dialog" id="nuevamodal">
    
      <!-- Modal content-->
      <div class="modal-content" id="formnuevo">

         
       
      </div>
      
    </div>
  </div>
  
</div>

<div class="modal fade" id="ventanaeditar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="formeditar">

          
       
      </div>
      
    </div>
  </div>
 <!-- jQuery -->
    <script src="js/jquery.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
<!--<script src="js/push.js"></script>-->
 <script type="text/javascript" src="js/funciones.js"></script>
</body>

</html>
<?}else{


header("location:index.php?error=1");


    }?>