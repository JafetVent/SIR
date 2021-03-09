<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href=Estilos/style.css">

</head>
<style type="text/css">
  .carousel-inner img {
    width: 100%;
    height: 100%;
    z-index: 1;
    
  }

  #demo{
    position: all;
    z-index: 2;
  }

  
  .carousel-item{
    min-height: 600px;
    background-size: cover;
  }

</style>
<body>

  <div id="carouselExampleIndicators" class="carousel slide card" data-ride="carousel">
    <div class="carousel slide">
      <div class="carousel-item active" style="background-image: url(Imagenes/Login/1.jpg);">
        
      </div>
      <div class="carousel-item" style="background-image: url(Imagenes/Login/2.jpg);">
        
      </div>
      <div class="carousel-item" style="background-image: url(Imagenes/Login/3.jpg);">
        
      </div>
    </div>

    <div class="card-img-overlay">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm-4">
            <div class="card shadow-lg">
              <div class="card-body justify-content-center text-center">
                <form class="p-5 bg-light" method="POST">
                  <div class="form-group">
                    <h2 class="h4 text-center text-info">Iniciar Sesión</h2>
                    <div class="form-group">
                      <label for="user">
                        Usuario:
                      </label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" id="noTrabajador" name="ingresoUsuario">
                      </input>
                    </div>


                    <div class="form-group">
                      <label for="password">
                        Contraseña:
                      </label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="pwd" name="ingresoPassword">
                      </input>
                    </div>
                  </div>

                </div>
                
                
              </div>                                    
              <button class="btn btn-primary" type="submit">
                Ingresar
              </button> 
              
            </form>                                                             
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>    

<?php

$ingreso =  new controladorFormularios;
$ingreso -> ctrIngreso();

?>   

</body>
</html>