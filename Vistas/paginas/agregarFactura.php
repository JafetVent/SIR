<div class="container py-5">

<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="POST">

        <!--Campo idInvoice-->
        <div class="form-group">
            <label for="idInvoice">
              Id Invoice
          </label>

          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
            </div>
            <input type="text" class="form-control" id="idInvoice" name="registroFactura">
        </input>
    </div>
</div>

<!--Campo Proveedor-->
<div class="form-group">
    <label for="proveedor">
      Proveedor:
  </label>

  <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
    </div>
    <input type="text" class="form-control" id="proveedor" name="registroProveedor">
</input>
</div>
</div>



<!--Campo imagen-->
<div class="form-group">
    <div class="input-group">
       <label for="myfile">Seleccione una archivo:</label>
  <input type="file" id="myfile" name="myfile"><br><br>

</div>
</div>



<?php
    # La lista de nombres; por defecto vacía
    $nombres = [];
    # Si hay nombres enviados por el formulario; entonces
    # la lista es el formulario.
    # Cada que lo envíen, se agrega un elemento a la lista
    if (isset($_POST["nombres"])) {
        $nombres = $_POST["nombres"];
    }
    # Detectar cuál botón fue presionado
    # Más info: https://parzibyte.me/blog/2019/07/23/php-formulario-dos-botones/
    # En caso de que haya sido el de guardar, no agregamos más campos
    if (isset($_POST["guardar"])) {
        # Quieren guardar; no quieren agregar campos
        echo "OK se guarda lo siguiente:<br>";
        print_r($nombres);
        exit;
    }
    ?>
    <form method="post" action="index.php">
        <!--Comienza el ciclo que dibuja los campos dinámicos-->

        <?php foreach ($nombres as $nombre) { ?>
            <input value="<?php echo $nombre ?>" type="text" name="nombres[]">
            <br><br>
        <?php } ?>
        <!--Termina el ciclo que dibuja los campos dinámicos-->

        <!--Fuera de la lista tenemos siempre este campo, es el primero-->
        <input autocomplete="off" autofocus value="" type="text" name="nombres[]">
        <br><br>
        <button name="agregar" type="submit">Agregar Parte</button>
        <button class="btn btn-primary" name="guardar" type="submit">Guardar Factura</button>
    </form>
</form>
</div>
</div>