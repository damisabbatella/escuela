<div class="modal-header panel-heading bg-success">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title">Datos personales</h4>
</div>
<div class="modal-body ">
  <div class="row">
    <?
    include("../inc_conectoresi.php");
    $sql="SELECT * from regalumnos where id=".$_POST["idalumno"]." and status=1";
    $resultado=mysqli_query($con,$sql);
    $fila=mysqli_fetch_assoc($resultado);
    ?>
    <div class="col-md-12 col-xs-12">
      
      <div class="col-md-2 col-xs-2">
        <?
        $imagen=($fila["fotoperfil"]!="")?$fila["fotoperfil"]:"sinimagen.jpg";
        ?>
      <img  class="img-thumbnail" src="fotos/portfolio/<?php echo $imagen ?>"/></div>
      <div class="col-md-12 col-xs-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Edad</th>
              <th>Dni</th>
              <th>Estado</th>
              <th>Fecha nac.</th>
              <th>Fecha de inscrp.</th>
              <th>Nacionalidad</th>
          <th>Estudios</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?=$fila["nombre"]?></td>
              <td><?=$fila["apellido"]?></td>
              <td><?=$fila["edad"]?></td>
              <td><?=$fila["dni"]?></td>
              <td><?=$fila["estado"]?></td>
              <td><?=$fila["fechanac"]?></td>
              <td><?=$fila["fecha"]?></td>
                <td><?=$fila["nacionalidad"]?></td>
          <td><?=$fila["estudios"]?></td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          
          
          <th>Direccion</th>
          <th>Email</th>
          <th>Provincia</th>
          <th>Localidad</th>          
          <th>Como nos conocio</th>
          <th>Curso</th>
          <th>Otro Curso</th>
          <th>Telefono</th>
          <th>Telefono laboral</th>
          
        </tr>
      </thead>
      <tbody>
        <tr>
          
          
          <td><?=$fila["direccion"]?></td>
          <td><?=$fila["email"]?></td>
          <td><?=$fila["idprovincia"]?></td>
          <td><?=$fila["idlocalidad"]?></td>
          
          <td><?=$fila["recomendaciones"]?></td>
          <td><?=$fila["idcurso"]?></td>
          <td><?php if($fila["id_curso"]!=0){echo "$".$fila["id_curso"];}else{echo "-";} ?></td>
          <td><?=$fila["telefono"]?></td>
          <td><?=$fila["tellaboral"]?></td>
        
        </tr>
      </tbody>
    </table>
  </div>
</div>