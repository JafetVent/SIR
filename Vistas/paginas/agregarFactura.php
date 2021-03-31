<div class="container py-5">
    <div class="d-flex justify-content-center text-center">
        <form class="p-5 bg-light" method="POST" enctype="multipart/form-data">



            <!--Campo idInvoice-->
            <div class="form-group">
                <label for="idInvoice">
                    Id Invoice
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                    </div>
                    <input type="text" class="form-control" id="idInvoice" name="registroFactura"></input>
                </div>
            </div>

            <!--Campo Fecha-->
            <div>
            <input type="date" name="registroFecha" step="1" min="" max="" value="<?php echo date("Y-m-d");?>">
            </div>



            <!--Campo Archivo-->
            <div class="form-group">
                <div class="input-group">
                    <label for="myfile">Seleccione una archivo:</label>
                    <input type="file" id="myfile" name="myfile"><br><br>
                </div>
            </div>
                <button class="btn btn-primary" name="guardar" type="submit">Guardar Factura</button>
            </form>
        </form>
    </div>
</div>

 <?php
    /*FORMA QUE SE INSTANCIA LA CLASE DE UN METODO NO ESTATICO*/
       // $registro = new controladorFormularios();
       // $registro -> ctrRegistro();

    /*FORMA QUE SE INSTANCIA LA CLASE DE UN METODO ESTATICO*/
        $registro = controladorFormularios::ctrRegistroF();
        //echo $registro;

        if ($registro == "ok") {

            echo '<script>

                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }

            </script>';

            echo '<div class="alert alert-success">La Factura ha sido registrada</div>';
        }

    ?>