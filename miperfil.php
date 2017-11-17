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
                          Mi perfil
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

   


                </div>
                <!-- /.row -->
               <div class="row">
                    <div class="col-lg-12">
                        
       <?php
       include("inc_conectoresi.php");
            $sql="SELECT * from usuarios where id=".$_SESSION['idusuario'];
            $resultado=mysqli_query($con,$sql);
            $fila=mysqli_fetch_assoc($resultado)
            ?>
  

<form id="miFormulario"  method="POST" enctype="multipart/form-data" action="includes/usuarios/editarfoto.php?id=<?=$fila["id"]?>"  >
                        <div id="formulario">

 <div class="form-group col-md-12">
                                
                                <label>Imagen</label>
                                
                                
                                <div>
                                    <?
                                    $imagen=($fila["foto"]!="")?$fila["foto"]:"sinimagen.jpg";
                                    ?>
                                    <img id="imageneditar" class="img-thumbnail"  src="fotos/portfolio/<?=$imagen?>">
                                    <input name="foto_perfil" class="form-control col-md-2" id="campo3"   type="file" onchange="document.getElementById('imageneditar').style.display='none'" />
                                </div>
                                
                            </div>

<div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label>Usuario</label>
                                <input name="datos0" class="form-control" id="campo0" type="text" value="<?=$fila["admin"] ?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input name="datos1" class="form-control" id="campo1" type="text" value="<?=$fila["email"]?>"/>
                            </div>
                          
                            
                            <!-- FOTO DE PORTADA -->
                           
                            
                        </div>
                        <button type="button" value="Aceptar" class="btn btn-default" onClick="validarfotousuario(<?=$fila["id"]?>)">Aceptar</button>
                        
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