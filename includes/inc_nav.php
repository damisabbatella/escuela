<?php
session_start();
include("inc_conectoresi.php");

?>
<!-- Navigation -->
<style>
    #blanco{
       
        color:#fff;





    }



</style>
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
            <a href="#" class="dropdown-toggle"  data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b> <?=$nmensajes?>&nbsp;consultas cursos </a>

        
      
       
        
         

         
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
                                <p><?=$fila["curso"]?></p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-md btn-success" onClick="tuconsulta(<?=$fila["id"]?>)">Tu consulta</button>
                    </a>
                </li>
                
                
                <?}?>
                
                <input type="hidden" id="cantmensajes" value="<?=$nmensajes?>">
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
                
                
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="imagenp" src="fotos/portfolio/<?php echo $imagen ?>"><b class="caret"></b>HOLA &nbsp;<?php echo $_SESSION["admin"];?></b> </a>
                
                
                
               <?mysqli_close($con);?> 
                
               
                
                <ul class="dropdown-menu">
                    <li>
                        <a href='miperfil.php'><i class="fa fa-fw fa-user"></i> Perfil</a>
                    </li>
                    <li>
                        <a href="boletin.php"><i class="fa fa-fw fa-envelope"></i> Bandeja Entrada</a>
                    </li>
                    
              
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
                    
                    <li>
                        <a href="usuarios.php"><i class="fa fa-fw fa-users"></i> Usuarios</a>
                    </li>
                    <li>
                        <a href="regalumnos.php"><i class="fa fa-fw fa-users"></i> Alumnos</a>
                    </li>
                    <li>
                        <a href="boletin.php"><i class="fa fa-fw fa-users"></i> Newsletter</a>
                    </li>
                  
                    <li>
                        <a href="cursos.php"><i class="fa fa-fw fa-users"></i> Cursos</a>
                    </li>
                   
                    
                    <li>
                        <a href="caja.php"><i class="fa fa-fw fa-users"></i>Caja</a>
                    </li>
                    <li>
                        <a href="ingreseacuentacorriente.php"><i class="fa fa-fw fa-users"></i>ingrese a Cuenta corriente</a>
                    </li>
                    <li>
                        <a href="grupo.php"><i class="fa fa-fw fa-users"></i>Grupo</a>
                    </li>
                    <li>
                        <a href="inscripciones.php"><i class="fa fa-fw fa-users"></i>Inscripcion de alumnos</a>
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
