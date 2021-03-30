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

  <style>
  /* Make the image fully responsive */
  #hide-me {
     display: none;
}
</style>
<!--------------LOGOTIPO----------->

<body>
  <dir>
<nav class="navbar navbar-expand-sm justify-content-center">
    <img src="Imagenes/pass-logo.png" alt="Logo">
</nav>
</dir>

<div  class="container-fluid bg-light">
        <div class="container">
            <ul class="nav nav-justified py-2 nav-pills">
                     <!--GET: $_GET["variable"] Variables que se pasan como parametros via URL (Tambien conocido como cadena de consulta a través de la URL)
                        Cuando es la primera variables se separa con ?, las que siguen se separan con &-->

                        <!--REGISTRO-->
                        <?php if (isset($_GET["pagina"])): ?>
                            <?php if ($_GET["pagina"]=="factura"): ?>
                             <li class="nav-item">
                                <a class="nav-link active" href="index.php?pagina=factura">
                                    Factura
                                </a>
                            </li> 
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?pagina=factura">
                                        Factura
                                    </a>
                                </li>
                            <?php endif ?>
                        <?php endif ?>

                        <!--INGRESO-->
                        <?php if (isset($_GET["pagina"])): ?>
                            <?php if ($_GET["pagina"]=="parte"): ?>
                             <li class="nav-item">
                                <a class="nav-link active" href="index.php?pagina=parte">
                                    Partes
                                </a>
                            </li> 
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?pagina=parte">
                                        Partes
                                    </a>
                                </li>
                            <?php endif ?>
                        <?php endif ?>

                        <!--INICIO-->
                        <?php if (isset($_GET["pagina"])): ?>
                            <?php if ($_GET["pagina"]=="reportes"): ?>
                             <li class="nav-item">
                                <a class="nav-link active" href="index.php?pagina=reportes">
                                    Reportes
                                </a>
                            </li> 
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?pagina=reportes">
                                        Reportes
                                    </a>
                                </li>
                            <?php endif ?>
                        <?php endif ?>

                        <!--SALIR-->
                        <?php if (isset($_GET["pagina"])): ?>
                            <?php if ($_GET["pagina"]=="salir"): ?>
                             <li class="nav-item">
                                <a class="nav-link active" href="index.php?pagina=salir">
                                    Salir
                                </a>
                            </li> 
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?pagina=salir">
                                        Salir
                                    </a>
                                </li>
                            <?php endif ?>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php?pagina=factura">
                                        Factura
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?pagina=parte">
                                        Partes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?pagina=reportes">
                                        Reportes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?pagina=salir">
                                        Salir
                                    </a>
                                </li>


                            <?php endif ?>
                        </ul>
                    </div>
                </div>
        <!--------------CONTENIDO-------->

        <div class="container-fluid">
            <div class="">
        <?php

              #ISSET: isset() determina su una variable esta definida y no es NULL

        if (isset($_GET["pagina"])) {
          if ($_GET["pagina"]=="login" || 
              $_GET["pagina"]=="factura" || 
              $_GET["pagina"]=="parte" ||
              $_GET["pagina"]=="salir"||
              $_GET["pagina"]=="agregarParte" ||
              $_GET["pagina"]=="agregarFactura"||
              $_GET["pagina"]=="editar" ||
              $_GET["pagina"]=="valoresParte"||
              $_GET["pagina"]=="reportes"            ) 
          {
            include "paginas/".$_GET["pagina"].".php";
          }else{
            include "paginas/error404.php";
          }


        }else{

          include "paginas/login.php";

        }

        ?>
                </div>
                </div>              
  </body>
  </html>