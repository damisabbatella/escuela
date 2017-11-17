<?
 include("../inc_conectoresi.php");
            $sql="SELECT * from consultas where estado='enviado'";
$resultado=mysqli_query($con,$sql);
$nmensajes=mysqli_num_rows($resultado);
if($nmensajes>$_POST["cantmensajes"]){
?>
<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b> <?=$nmensajes?> mensajes</a>
                    <ul class="dropdown-menu message-dropdown">
                                 <?
        

while($fila=mysql_fetch_assoc($resultado)){


            ?>
                
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                   
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?=$fila["nombre"]?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?=$fila["fecha"]?> a las <?=$fila["hora"]?></p>
                                        <p><?=$fila["consulta"]?></p>
                                    </div>
                                </div>
                                 <button type="button" class="btn btn-md btn-success" onClick="tuconsulta(<?=$fila["id"]?>)">Tu consulta</button>
                            </a>

                        </li>
                     
                        
                <?}?>
               
                        <input type="hidden" id="cantmensajes" value="<?=$nmensajes?>">
                    </ul>
                </li>

                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Notificacion <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Notificacion <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Notificacion <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Notificacion <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Notificacion <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Notificacion <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Edgardo Villafañe <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Bandeja Entrada</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>

<?}else{
	
echo 0;

}
?>