<!DOCTYPE html>
<html lang="en">
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
    z-index: 1;
    
  }

  #demo{
    position: all;
    z-index: 2;
  }

  </style>
<body>

<div  class="carousel slide" data-ride="carousel">
 
  <!-- The slideshow --><!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Imagenes/Login/1.jpg" alt="Image1" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="Imagenes/Login/2.jpg" alt="Image2" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="Imagenes/Login/3.jpg" alt="Image3" width="1100" height="500">
    </div>
  </div>

<div id="demo" class="d-flex justify-content-center text-center">
<form class="p-5 bg-light" method="POST">

    <!--Campo email-->
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

        <!--Campo contraseña-->
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

    <?php
    
        $ingreso =  new controladorFormularios;
        $ingreso -> ctrIngreso();

    ?>

    <button class="btn btn-primary" type="submit">
        Ingresar
    </button>

</form>
</div>

</body>
</html>