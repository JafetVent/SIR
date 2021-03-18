<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
</style>

</head>
<body>
<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Imagenes/Login/1.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
      </div>   
    </div>
    <div class="carousel-item">
      <img src="Imagenes/Login/2.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
      </div>   
    </div>
    <div class="carousel-item">
      <img src="Imagenes/Login/3.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
      </div>   
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
</div>

<?php

$ingreso =  new controladorFormularios;
$ingreso -> ctrIngreso();

?>   

</body>
</html>
