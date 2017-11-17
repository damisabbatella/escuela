  <?php
	include("../inc_conectoresi.php");
	$paso= $_POST['paso'];
	$pagina= $_POST['pagina'];
	$tabla=$_POST["tabla"];
	$columnas=$_POST["columnas"];
	$col = explode("|",$_POST["columnas"]);
	$clave= $_POST["clave"];
	$sel1="";
	$sel2="";
	$sel3="";
	if($clave==""){
		$buscador="";
	}else{
		$buscador=" and a.$col[0] like '%$clave%'";
	}
	include("../inc_paso.php"); 
	$sql="SELECT  a.id numcomentario,a.idleccion,a.idusuario,a.fechapreg,a.pregunta,a.fecharesp,a.respuesta,a.idadmin,a.estado,a.status,
	b.id,b.titulo,c.id,c.nombre,d.id usuario,d.usuario
	from comentarios a, lecciones b, alumnos c, usuarios d 
	where a.status=1 and c.id= a.idusuario and b.id= a.idleccion and d.usuario= a.idadmin

	$buscador order by a.id desc limit $inicio,$paso";	
	$resultado= mysqli_query($con,$sql);

	$cont = 0;
	

	while($comentarios=mysqli_fetch_assoc($resultado)){
	$cont++;
	if($cont % 2 ==0){
		$clase = "clara";
	}else{
		$clase = "oscuro";
	}

	?>
      <tr id="f<?php echo $cont?>" class="fila <?php echo $clase ?>">
        <td style="width:60px">
          <input id="check<?php echo $cont?>" type="checkbox" onClick="resaltar(<?php echo $cont?>)" value="<?php echo $comentarios['numcomentario']?>"/>
        </td>
        
       
        <td ><?=$comentarios["titulo"]?></td>
        <td ><?=$comentarios["nombre"]?></td>
       <td ><span class="badge floatr"><?=date_format(date_create($comentarios["fechapreg"]),"d/m/y H:i")?></span><br><?=$comentarios["pregunta"] ?></td>
        <td ><?=$comentarios["usuario"] ?></td>
              
   <td>   
<?
if($comentarios["respuesta"]!=""){
?>
<span class="badge floatr"><?=date_format(date_create($comentarios["fecharesp"]),"d/m/y H:i")?></span><br><?=$comentarios["respuesta"]?></td>

<?}?>


      
       <?
if($comentarios["estado"]=="respondido"){
?>

 

 <td><strong><?=$comentarios["estado"]?></strong></td>


<?



}else{

?>
 <td ><button class="btn btn-md btn-success" onClick="tucomentario(<?=$comentarios['numcomentario']?>)">Responder</button></td>
      

<?}


       ?>






    
</tr>
	  <?}
	  ?>



      <?include("../inc_paginador.php");?>
	  
	 
      