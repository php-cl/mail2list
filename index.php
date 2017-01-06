<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset ="UTF8">
  <title> Mail2List | Extraer Mail </title>
  <meta name="viewport" content="width = device-width">
  <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
  <link rel="stylesheet" href="style.css">
</head>
 <body>


 <a class="orange_mar" href="http://www.marlonfalcon.cl/">
   <img alt="marlon" src="../webkode/assets/img/right_orange.png" style="position: fixed; top: 0; right: 0; border: 0;z-index:9999;"  id="marlon" >
 </a>


  <div class="wrapper-header">
  	<div class="container">
      <div class="row"> 
          <div class="col-md-4">
                <a href="index.php"><img src="favicon.png" alt=""></a>
          </div>
          <div class="col-md-8">
                <h1>Mail2List</h1>
                <h3>Extraer Mail a un texto</h3>
          </div>
      </div> <!-- row -->  	  
  	</div>
  </div>


<div class="main">

  <div class="main">
  <div class="container">
    <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">DATOS</h3>
    </div>
    <div class="panel-body">
    <form action="index.php" role="form" method="post">

        <div class="form-group">
          <label for="">Texto:</label>
          <textarea class="form-control" value="Clear" name="mail" rows="5" required></textarea>
        </div>


        <div class="form-group">
                <button type="submit" class="btn btn-primary">Convertir</button>
           </div> 


         <div class="form-group">
          <label for="">Correos:</label>
          <textarea class="form-control" value="Clear" name="texto" rows="15">
           <?php
          if($_POST){
                       $cadena =   $_POST['mail'];
                       $longitud = strlen($cadena);
                       $pila = array();
                       $j= 0;

                       for($i=0; $i<$longitud; $i++)
                              {
                                 if (ctype_space($cadena[$i]))
                                      {                                          
                                          $pila[$j] = $i;
                                          $j++;
                                      }

                                  if ($cadena[$i] == "@")
                                      {                                          
                                          $pila[$j] = $i;
                                          $j++;
                                      }   


                                 //echo $cadena[$i];     
                                                            
                              } 


                         $longitud1 = count($pila);
                           //echo "-------------->";
                        for($i=1; $i<$longitud1; $i++)
                              {
                                 
                                 $pos = $pila[$i];

                               if( $i<$longitud1-1) 
                               {
                                 $f = $i+1;
                                 $posp = $pila[$f];
                               }                             

                                 if ($cadena[$pos] == "@"){
                                  
                                   $cant_cadena = $posp - $temp;
                                   echo substr($cadena, $temp, $cant_cadena);
                                   echo ",";

                                 }

                                 $temp = $pila[$i];
                                 
                              }

                    }
          ?>
          </textarea>
        </div>

      </form>
    </div>
  </div>
     </div>  
</div> 



</div>

    

<div class="footer-wrapper"> 
    <a href="mailto:falconsoft.3d@gmail.com"><p>By Marlon Falcon Hernandez</p></a>
</div>



<div class="container">

  <?php

    if($_POST)
    {
      $para= $_POST['mail'];
    }

   ?>


</div>



 </body>
</html>