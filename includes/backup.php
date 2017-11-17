<?php
 /***********************************************************/
/******************** BACKUP ***************************/
/******************** ********** ***************************/
include("inc_conectores.php");   
if($_POST["accion"]=="hacerBC"){ 




$dump = "";            
$drop = false; 

$tablas = false; 
 
$compresion = false; 

if ( empty($tablas) ) { 
    $consulta = "SHOW TABLES FROM $base"; 
    $respuesta = mysql_query($consulta) 
    or die("No se pudo ejecutar la consulta: ".mysql_error()); 
    while ($fila = mysql_fetch_array($respuesta, MYSQL_NUM)) { 
        $tablas[] = $fila[0]; 
    } 
} 



foreach ($tablas as $tabla) { 
     
    $drop_table_query = ""; 
    $create_table_query = ""; 
    $insert_into_query = ""; 
     

    //Se halla el query que será capaz de recrear la estructura de la tabla. 
    $create_table_query = ""; 
    $consulta = "SHOW CREATE TABLE $tabla;"; 
    $respuesta = mysql_query($consulta) 
    or die("No se pudo ejecutar la consulta: ".mysql_error()); 
    while ($fila = mysql_fetch_array($respuesta, MYSQL_NUM)) { 
            $create_table_query = $fila[1].";\n\n"; 
    } 
     
    // Se halla el query que será capaz de insertar los datos.  
    $insert_into_query = ""; 
    $consulta = "SELECT * FROM $tabla;"; 
    $respuesta = mysql_query($consulta) 
    or die("No se pudo ejecutar la consulta: ".mysql_error()); 
    while ($fila = mysql_fetch_array($respuesta, MYSQL_ASSOC)) { 
            $columnas = array_keys($fila); 
            foreach ($columnas as $columna) { 
                if ( gettype($fila[$columna]) == "NULL" ) { 
                    $values[] = "NULL"; 
                } else { 
                    $values[] = "'".mysql_real_escape_string($fila[$columna])."'"; 
                } 
            } 
            $insert_into_query .= "INSERT INTO `$tabla` VALUES (".implode(", ", $values).");\n"; 
            unset($values); 
			
    } 
$insert_into_query .="\n";
$dump .=  $create_table_query .$insert_into_query ;

} 





$version = date("Y_m_d_His");     
$nombre_archivo = "../backup/BackUp_$version.txt"; 
$contenido = $dump; 
fopen($nombre_archivo, 'a+'); 

// Asegurarse primero de que el archivo existe y puede escribirse sobre el. 
if (is_writable($nombre_archivo)) { 

   // En nuestro ejemplo estamos abriendo $nombre_archivo en modo de adicion. 
   // El apuntador de archivo se encuentra al final del archivo, asi que 
   // alli es donde ira $contenido cuando llamemos fwrite(). 
   if (!$gestor = fopen($nombre_archivo, 'a')) { 
         echo "No se puede abrir ($nombre_archivo)"; 
         exit; 
   } 

   // Escribir $contenido a nuestro arcivo abierto. 
   if (fwrite($gestor, $contenido) === FALSE) { 
       echo "No se puede escribir ($nombre_archivo)"; 
       exit; 
   } 
    

    
   fclose($gestor); 

} else { 
   echo "No se puede escribir en $nombre_archivo"; 
} 
}

 

?>

