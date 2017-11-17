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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

<? include("../inc_nav.php") ?>

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
 <?php

$sql="SELECT * from lecciones where id=".$_GET["idleccion"];
$resultado=mysqli_query($con,$sql);
$leccion=mysqli_fetch_assoc($resultado);
?>
               <div class="row">


                    <div class="col-lg-12">
                        
    
    

<form id="Formu"  method="POST"  action="editarleccion.php?idleccion=<?=$leccion["id"]?>"
>
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
  <select id="campo3" class="form-control" name="datos3">
  
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
    <script src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/funciones.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
</body>

</html>
