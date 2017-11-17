<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Curso[it] - Panel de Control</title>
       
            <style>
#calendario {
 width: 180px;
 height: 200px;
 border: #000000 solid 1px;
 padding: 16px 6px 4px 16px;
}
#calendario div {
 width: 18px;
 height: 18px;
 float: left;
 border: #000 solid 1px;
 margin: 2px;
 font-size: 10px;
 font-family: Arial, Helvetica, sans-serif;
 text-align: center;
 line-height: 18px;
}
#calendario div b {
 color: #0000FF;
}
#calendario #atras {
 width: 28px;
 height: 28px;
 float: left;
 border: #000 solid 1px;

 background-repeat:no-repeat;
 background-position:-49px 0;
 border:none;
  margin:-8px 0 0 0;
}
#calendario #atras:hover {
 background-position:-25px 0;
 
    
    
    
    }
#calendario #adelante {
 width: 28px;
 height: 28px;
 float: left;
border:none;
 background-position:-75px 0;

 margin:-8px 0 0 0;
}
#calendario #nombremes {
 width: 100px;
 height: 28px;
 float: left;
 font-family: Arial, Helvetica, sans-serif;
 font-size: 12px;
 text-align: center;
 border:none; 
 line-height: 15px;
}
#calendario #clear{
  width: 180px;
  height:1px;
 border:none;
 clear: both;
    }
    #calendario div.diaactual b{
        color:#F9181C;
        
        
        }
</style>





       
    </head>
    <body>
       

      <div id="calendario"> </div>
<input id="mesoculto" type="text"  />
<input id="anooculto" type="text"  />                                  
    <script  src="js/calendario.js"></script>                               

</body>
</html>