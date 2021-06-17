<div class="container py-5">
<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="POST" enctype= multipart/form-data>

        <!--Campo No.Parte-->
        <div class="form-group">
            <label for="noParte">
              No. Parte:
          </label>

          <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
            </div>
            <input type="text" class="form-control" id="noParte" name="registroParte"></input>
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

<!--Campo SubProveedor-->
<div class="form-group">
    <label for="subProveedor">
      SubProveedor:
  </label>

  <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-dolly-flatbed"></i></i></span>
    </div>
    <input type="text" class="form-control" id="subProveedor" name="registroSubProveedor">
</input>
</div>
</div>

<!--Campo Descripción-->
<div class="form-group">
    <label for="descripcion">
        Descripción:
    </label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-info"></i></i></span>
        </div>
        <textarea name="registroDescripcion" rows="5" cols="60"></textarea>
   </div>
</div>

<!--Campo imagen-->
<div id="content">
            <input type="file" 
                   name="imagen" 
                   value="">
  
            <div>
                <button type="submit"
                        name="upload">
                  Subir
                </button>
            </div>
    </div>
</form>
</div>
</div>


 <?php
    /*FORMA QUE SE INSTANCIA LA CLASE DE UN METODO NO ESTATICO*/
       // $registro = new controladorFormularios();
       // $registro -> ctrRegistro();

    /*FORMA QUE SE INSTANCIA LA CLASE DE UN METODO ESTATICO*/
        $registro = controladorFormularios::ctrRegistro();
        //echo $registro;

        if ($registro == "ok") {

            echo '<script>

                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }

            </script>';

            echo '<div class="alert alert-success">La parte ha sido registrada</div>';
        }

    ?>