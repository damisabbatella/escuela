<?php 

session_start();
	 
if(!isset($_SESSION["usuario"])){
   if(!$_COOKIE["usuario"]){
	  session_unset();
      session_destroy();
	  header("location:index.php?error=2");
      }
}else{

//hago login

     $_SESSION['usuario'] = $_COOKIE["usuario"];
	 $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
}	


?> 
