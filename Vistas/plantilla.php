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

<!--------------LOGOTIPO----------->

<div class="img-container"> 
  <img src="Imagenes/pass-logo.png" alt="PASS logo" class="center">
</div>

</head>

<style>
  body {
    font-family: "Lato", sans-serif;
  }

  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }

  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #0275d8;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #292b2c;
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover {
    color: ##292b2c;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }


  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 35px;}
    .sidenav a {font-size: 18px;}
  }

  #hide-me {
    width: 100px;
    height: 100px;
    background: #bf7130;
    display: block;
    padding: 10px;
    margin: 0 15px 0 0;
    font-size: 14px;
    font-weight: bold;
    float: left;
    text-align: center;
    background: rgba(0, 0, 0, .15);
  }
</style>
<body>




  <!--------------MENU DESPEGABLE-------->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a href="index.php?pagina=perfil"><i class="fas fa-user"></i>  Perfil</a>
    <a href="index.php?pagina=factura">Facturas</a>
    <a href="index.php?pagina=parte">Partes</a>
    <a href="index.php?pagina=salir">Cerrar Sesión</a>

  </div>

  <div id="main" class="container-fluid">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

    <div class="container-fluid">
      <div class="container py-5">
        <!--------------CONTENIDO-------->


        <?php



                #ISSET: isset() determina su una variable esta definida y no es NULL

        if (isset($_GET["pagina"])) {
          if ($_GET["pagina"]=="login" || 
              $_GET["pagina"]=="factura" || 
              $_GET["pagina"]=="parte" ||
              $_GET["pagina"]=="salir"||
              $_GET["pagina"]=="agregarParte" ||
              $_GET["pagina"]=="agregarFactura") 
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


    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
    </script>
  </body>
  </html>