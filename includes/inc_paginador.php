<tr class="panel-footer">

<td class="col-lg-12" colspan="<?if($tabla=="boletin"||$tabla=="grupo"){ echo count($col)+6 ;}else{echo count($col)+1;}?>">

  <div id="paginador" class="pull-right" >
    <div class="pag">
    <span>mostrar filas</span>  
        <select id="selector"  onChange="cambio_paso()">
          <option <?php echo $sel1?>>5</option>
          <option <?php echo $sel2?>>10</option>
          <option <?php echo $sel3?>>50</option>
          <option <?php echo $sel4?>>100</option>
        </select>
        <span><?php echo $inicio+1 ?>-<?php echo $maximo ?> de <?php echo $cant_filas ?></span>
        <button id="atras" type="button"  onClick="atras()" class="btn btn-xs btn-info"><i class="fa fa-fw fa-chevron-left"></i></button>
        <button id="adelante" type="button"  onClick="avanzar()" class="btn btn-xs btn-info"><i class="fa fa-fw fa-chevron-right" ></i></button>
        <input id="cant_filas" type="hidden" value="<?php echo $maximo ?>"/>
      </div>
    </div>
    </td>
</tr>    