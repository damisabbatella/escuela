<?php
include("../../includes/inc_conectoresi.php");
$sqlcurso="SELECT * from cursos where id=".$_POST["curso"];
$resultadocurso=mysqli_query($con,$sqlcurso);
$curso=mysqli_fetch_assoc($resultadocurso);
$sql="SELECT * from grupo where id=".$_POST["grupo"]." and idcurso=".$curso["id"];
$resultado=mysqli_query($con,$sql);
$fila=mysqli_fetch_assoc($resultado);
?>
<div class="col-md-12 encabezado2">
  <h1><?=$fila["nombre"]?></h1>
  <?if($fila["idcurso"]==$curso["id"]){?><h1><?=$curso["curso"]?></h1><?}else{echo "";}?>
</div>
<div class="col-md-12 encabezado1">
  <h3><?
  if($fila["lu"]!=0){?><span>Lunes</span> <?}else{?><span><?php echo "";?></span>
  <?}if($fila["ma"]!=0){?><span>Martes</span> y <?}else{?><span><?php echo "";?></span>
  <?}if($fila["mie"]!=0){?><span>Miercoles</span><?}else{?><span><?php echo "";?></span>
  <?}if($fila["jue"]!=0){?><span>Jueves</span><?}else{?><span><?php echo "";?></span>
  <?}
  if($fila["vie"]!=0){?><span>Viernes</span><?}else{?><span><?php echo "";?></span>
  <?}if($fila["sab"]!=0){?><span>Sabados</span><?}else{?><span><?php echo "";?></span><?}?>
  <span><?=$fila["inicio"]?></span> a
  <span><?=$fila["finaliza"]?></span>hs
  </h3>
</div><br>
<div class="col-md-12">
  <div id="busc" class="form-group input-group col-md-2">
    <input type="text" class="form-control" id="buscaralumno" onKeyUp="asistente_busquedaporalumnos()" placeholder="buscar por nombre">
    
  </div>
  <div id="listadoalumnos"></div>
  <div class="col-md-6" id="datos"></div>
  <input type="hidden" id="numgrupo" value="<?=$fila["id"]?>">
  <input type="hidden" id="numcurso" value="<?=$curso["id"]?>">
  <ul id="listalu" class="col-md-4">
    
    
    
    
    
    <?
    $sqla="SELECT a.id idrel,a.idalumno,a.idgrupo,a.status,b.id,b.nombre from relalumnosgrupos a, regalumnos b where a.status=1 and b.id=a.idalumno and a.idgrupo=".$fila["id"];
    $resultadoa=mysqli_query($con,$sqla);
    
    
    
    //este es el id del grupo
    
    
    while($filas=mysqli_fetch_assoc($resultadoa)){
    ?>
    
    
    <li class="list-group-item" id="list<?=$filas["idrel"]?>"><?=$filas["nombre"]?>&nbsp;&nbsp;<button class="btn btn-danger" onclick="borraralumnog(<?=$filas["idrel"]?>)">eliminar</button></li>
    
    
    <?}
    ?>
    
  </ul>
  <div class="col-md-12">
    <?
    
    $sqlasistencia="SELECT a.id num,a.idalumno,a.idgrupo,a.status,b.id,b.nombre from relalumnosgrupos a, regalumnos b where a.status=1 and b.id=a.idalumno";
    $resultadoasistencia=mysqli_query($con,$sqlasistencia);
    ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Alumno</th>
          <th>Presente</th>
          <th>Ausente</th>
        </tr>
      </thead>
      <tbody class="radioasistencia">
        <?
        while($asistencia=mysqli_fetch_assoc($resultadoasistencia)){
        ?>
        <tr>
          <td><?=date('Y-m-d')?></td>
          <td><?=$asistencia["nombre"]?></td>
          <td><input data-idnum="<?=$asistencia["num"]?>"  name="tipo<?=$asistencia["num"]?>" type="radio" value="1"  /></td>
          <td><input data-idnum="<?=$asistencia["num"]?>" name="tipo<?=$asistencia["num"]?>" type="radio" value="0"  /></td>
        </tr>
      </td>
      <input type="text" id="numeroalumno" value="<?=$asistencia['idalumno']?>">
      <input type="hidden" id="fecha" value="<?=date('Y-m-d')?>">
      
    </tr>
    <?}
    ?>
    
  </tbody>
  
</table>
<button  class="btn btn-primary" onclick="altasistencia()">Guardar</button>
</div>
</div>