<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        SIR
    </title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/97f0a9a435.js">
    </script>
</link>
    </meta>
    </meta>
    
</head>

<body>


<!--------------LOGOTIPO----------->
    <div>
      <div class="container py-2 "> 
    <img src="Imagenes/pass-logo.png" alt="PASS logo" class="justify-content-center">
  </div>
    </div>

<!--------------CONTENIDO-------->
       <div class="container-fluid">
                    <div class="container py-5">       
                           <?php

                #ISSET: isset() determina su una variable esta definida y no es NULL

                        if (isset($_GET["pagina"])) {
                            if ($_GET["pagina"]=="busqueda" || 
                                $_GET["pagina"]=="factura" ||
                                $_GET["pagina"]=="login" || 
                                $_GET["pagina"]=="parte" ||
                                $_GET["pagina"]=="salir" ) 
                            {
                                include "paginas/".$_GET["pagina"].".php";
                            }else
                            {
                                include "paginas/error404.php";
                            }


                        }else
                        {

                            include "paginas/factura.php";

                        }


                        ?>  
   </div>
 </div>
              
            </body>
</html>