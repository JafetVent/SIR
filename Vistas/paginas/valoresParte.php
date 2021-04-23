<?php
if (isset($_GET["id"])) {
$item = "noParte";
$valor = $_GET["id"];
$varPar = ControladorFormularios::ctrSeleccionarRegistrosReporteVarPar($item, $valor);

}
$Factura = ControladorFormularios::ctrSeleccionarRegistrosFactura(null,null,null);
$Parte = ControladorFormularios::ctrSeleccionarRegistrosParte(null, null, null);
?>

<div class="container py-5">
<div class="d-flex justify-content-center text-center">

    <div>
         <?php echo "<img src='".$value["ruta_imagen"]."' height ='100' width ='100' >";?>
    </div>

 <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Caracteristica
                        </th>
                        <th>
                            Especificación
                        </th>
                        <th>
                            Equipo de Medición
                        </th>
                        <th>
                            Tolerencia Min
                        </th>
                        <th>
                            Tolerancia Max
                        </th>
                        
                    </tr>
                </thead>

                    <tbody id="myTable">
                    <?php foreach ($varPar as $key => $value): ?>
                    <tr>
                        <td>
                            <?php echo $value["caracteristicas"];?>
                        </td>
                        <td>
                            <?php echo $value["especificacion"];?>
                        </td>
                        <td>
                            <?php echo $value["equipo"];?>
                        </td>
                        <td>
                            <?php echo $value["toleranciamin"];?>
                        </td>
                        <td>
                            <?php echo $value["toleranciamax"];?>
                        </td>
                        <td>
                                <form method="POST">
                                    <input type="hidden" value="<?php echo $value["noParte"]; ?>" name="">
                                    <button type="submit"class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    <?php
                                    $eliminar = new ControladorFormularios();
                                    $eliminar -> ctrEliminarRegistro();
                                    ?>
                                </form>
                                
                            </div>                            
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>

        </div>

 <form method="POST">
               
                <table class="table table-striped"  id="tabla">
                    <tr class="fila-fija">
                        <td><input required name="caracteristicas" placeholder="Caracteristica"/></td>
                        <td><input required name="especificacion" placeholder="Especificación"/></td>
                        <td><input list="equipo" required name="equipo" placeholder="Equipo de Medición"/></td> 
                        <td><input required name="toleranciamin" placeholder="Tolerencia Min"/></td> 
                        <td><input required name="tolerenciamax" placeholder="Tolerancia Max"/></td>                 
 <datalist id="equipo">
    
        <option value="Vernier">
        <option value="Cinta Métrica">
        <option value="Visual">     
    
</datalist>
                    
                    </tr>
                </table>

                <div class="btn-der">
                    <input type="submit" name="insertar" value="Guardar Valores" class="btn btn-primary"/>
                    <button id="adicional" name="adicional" type="button" class="btn btn-success"> Agregar Valores </button>

                </div>
            </form>


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

<script>
            
            $(function(){
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional").on('click', function(){
                    $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
                });
             
                // Evento que selecciona la fila y la elimina 
                $(document).on("click",".eliminar",function(){
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                });
            });
        </script>


        <?php 

        /*=============================================
        FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO NO ESTÁTICO 
        =============================================*/
        
        // $registro = new ControladorFormularios();
        // $registro -> ctrRegistro();

        /*=============================================
        FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO ESTÁTICO 
        =============================================*/

        $registro = ControladorFormularios::ctrRegistro();

        if($registro == "ok"){

            echo '<script>

                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href );

                }

            </script>';

            echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
        
        }

        ?>