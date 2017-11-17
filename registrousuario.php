<!DOCTYPE html>
<html>
<head>
	<title>IFPB</title>
</head>
<body>
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
 <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
<title>ADMINISTRADOR</title>
<style>
body {
	margin:0;
	background-color:#007fff;
	background-repeat:no-repeat;
	background-position: top center;

}
#contenedor {
	position:absolute;
	width:100%;
	height:650px;
	margin:0 auto;
		
	

}
#logo {
	background-image: url(imagenes/LOGOR.jpg);
	background-repeat:no-repeat;
	width:80%;
	height:253px;
	background-size:contain;
margin:50px auto; 

background-position:top center;



	
	
}
#contenedor h1 {
	font:28px Arial, Helvetica, sans-serif bold;
	color:#fff;
}
#contenedor p {
	font:14px Arial, Helvetica, sans-serif bold;
	color:#fff;
	margin: 15px 0 5px 0;
}
.mensaje {
	font:14px Arial, Helvetica, sans-serif bold;
	color:#fff;
	text-align:center;
	
}
.mensaje a{
	
	color:#fff;
	
	
}
#formulario{

margin:0 auto;
width:30%;
	height:253px;


}


.usuario{
	margin-top:15px;


}
.contrasena{
	margin-top:15px;

}

.bot{
margin-top:15px;


}
.enlacec a{
	color:#fff;



}
.enlacec {
	
margin-top:45px 0 0 0;



}

@media screen and (max-device-width:480px){

#logo {
	background-image: url(imagenes/LOGOR.jpg);
	background-repeat:no-repeat;
	width:50%;
	height:253px;
	background-size:contain;
margin:50px auto; 

background-position:top center;



	
	
}


#formulario{

margin:0 auto;
width:80%;
	height:203px;


}


}



</style>
</head>

<body>
<div id="contenedor">
  <div id="logo"></div>
<div id="formulario">
 
    <input type="text"  class="form-control usuario" id="usuario" placeholder="usuario" required="required" name="usuario"  />
    <input type="text"  class="form-control usuario" id="email" name="email"  placeholder="email" required="required" onblur="verificaemail()"  />
        <input type="password" id="contrasena" name="contrasena"  class="form-control contrasena" placeholder="Contraseña" required="required" />
 <input type="password" id="contrasena1"  class="form-control contrasena" placeholder="repita Contraseña" required="required" />
   
        <button type="button" class="btn btn-primary btn-block btn-large bot" onclick="registrousuario()">Registrarse</button>




  
  </div>
  <div class="col-md-12 col-xs-12 mensaje"><a href="index.php">Iniciar sesion</a></div>
</div>

</body>
</html>

<script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>





