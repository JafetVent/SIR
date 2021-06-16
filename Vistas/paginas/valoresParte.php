<?php
if (isset($_GET["id"])) {
$item = "noParte";
$valor = $_GET["id"];
$varPar = ControladorFormularios::ctrSeleccionarRegistrosReporteVarPar($item, $valor);
$Parte = ControladorFormularios::ctrSeleccionarRegistrosParte($item, $valor);

}

?>


<div class="container py-4">
    <div class="row">
    <div class="col-sm-3" style="background-color:white-space: ;">
        <?php echo "<img src='".$Parte["ruta_imagen"]."' height ='200' width ='300' >";?>
    </div>
    <div class="col-sm-4" style="background-color:white;">
        <h3> No. Parte: <?php echo $Parte["noParte"];?></h3>
        <h4>Proveedor: <?php echo $Parte["proveedor"];?></h4>
        <h5>Subproveedor: <?php echo $Parte["subproveedor"];?></h5>
    </div>
    </div>


<div class="d-flex justify-content-center text-center">



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
                                    <input type="hidden" value="<?php echo $value["noParte"]; ?>" name="guardarRegistro">
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
                        <td><input type="hidden" required name="noParte[]" placeholder="Factura" value="<?php echo $valor;?>"/></td>
                        <td><input required name="caracteristicas[]" placeholder="Caracteristica"/></td>
                        <td><input required name="especificacion[]" placeholder="Especificación"/></td>
                        <td><input list="equipo" required name="equipo[]" placeholder="Equipo de Medición"/></td> 
                        <td><input required name="toleranciamin[]" placeholder="Tolerencia Min"/></td> 
                        <td><input required name="toleranciamax[]" placeholder="Tolerancia Max"/></td>                 
 <datalist id="equipo">
    
        <option value="Vernier">
        <option value="Cinta Métrica">
        <option value="Visual">     
    
</datalist>
                    <td class="eliminar"><input type="button"  class="btn btn-outline-danger" value="Eliminar"/></td>
                    </tr>
                </table>

                <div class="btn-der">
                    <input type="submit" name="insertar" value="Guardar Valores" class="btn btn-primary"/>
                    <button id="adicional" name="adicional" type="button" class="btn btn-success"> Agregar Valores </button>

                </div>
            </form>


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

        $registro = ControladorFormularios::ctrRegistroC();


        if($registro == "ok"){

            echo '<script>

                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href);

                }

            </script>';

            echo '<div class="alert alert-success">Las caracteristicas han sido registradas</div>';
        
        }

        ?>