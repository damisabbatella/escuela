<?php include("control.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Backup</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<script src="js/funciones.js" type="text/javascript"></script>
</head>
<body onload="mostrarlistaBC()">
<header>
  <h1>Administrador </h1>
  <span>Admin | admin | salir</span> </header>
<section>
  <aside>
    <nav>
      <?php include("includes/inc_menu.php") ?>
    </nav>
  </aside>
  <content>
    <h1>Backup</h1>

    <div style="clear:both"></div>

    <div id="filas"></div>
    
  </content>
</section>
<div style="clear:both"></div>
<footer>Edgardo Villafañe 2015</footer>
<div id="fondo"></div>
<div id="ventana">
	
</div>
<div id="asistente"></div>
<input type="hidden" value="backup" id="tabla"/>
</body>
</html>
