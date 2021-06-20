<?php
if (isset($_GET["id"])) {
$item = "idInvoice";
$valor = $_GET["id"];
$reporte = ControladorFormularios::ctrSeleccionarRegistrosReporteV($item, $valor);
}
$Parte = ControladorFormularios::ctrSeleccionarRegistrosParte(null,null,null);
?>
<div class="container py-5">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="row">
            
            <div class="col">
                <input class="form-control  mr-sm-2" id="myInput" type="text" placeholder="Buscar">
            </div>
                    </div>
    </nav>

            <table class="table table-striped">
                <thead>
                    <tr><th>
                            
                        </th>
                        <th>
                            No. Parte
                        </th>
                        <th>
                            Estatus
                        </th>
                        <th>
                            Acciones
                        </th>
                        
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach ($reporte as $key => $value): ?>
                    <tr>
                        <td style="visibility:hidden;">
                            <?php echo $value["idFacPar"];?>
                        </td>
                        <td>
                            <?php echo $value["noParte"];?>
                        </td>
                        <td>
                            <?php echo $value["estatus"];?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div class="px-1">
                                    <a href="index.php?pagina=vistaReporte&id=<?php echo $value["idFacPar"]; ?>"  class="btn btn-warning"><i class="fas fa-search"></i></a>
                                </div>
                                <form method="POST">
                                    <input type="hidden" value="<?php echo $value["idFacPar"]; ?>" name="eliminarRegistro">
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
        
        <form method="POST">
                <h3>Agregar Partes </h3>
                <table class="table"  id="tabla">
                    <tr class="fila-fija">
                        <td><input required name="idInvoice[]" placeholder="Factura" value="<?php echo $valor;?>"/></td>

                        <td><input list="partes" required name="noParte[]" placeholder="No. Parte"/></td>                
 <datalist id="partes">
    <?php foreach ($Parte as $key => $value): ?>
        <option value="<?php echo $value['noParte']; ?>">     
    <?php endforeach?>
</datalist>
                    
                     <td class="eliminar"><input type="button"  class="btn btn-outline-danger" value="Eliminar"/></td>

                    </tr>
                </table>

                <div class="btn-der">
                    <input  type="submit" name="insertar" value="Guardar No. Partes" class="btn btn-primary"/>
                    <button id="adicional" name="adicional" type="button" class="btn btn-success"> Agregar No.Partes </button>

                </div>
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
    /*FORMA QUE SE INSTANCIA LA CLASE DE UN METODO NO ESTATICO*/
       // $registro = new controladorFormularios();
       // $registro -> ctrRegistro();

    /*FORMA QUE SE INSTANCIA LA CLASE DE UN METODO ESTATICO*/
        $registro = controladorFormularios::ctrRegistroFP();
        

        if ($registro == "ok") {

            echo '<script>

                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }

            </script>';

            echo '<div class="alert alert-success">Los no.Parte se han registrado, favor de recargar la página</div>';
        }

    ?>
<script>
$(document).ready(function(){
$("#myInput").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#myTable tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});
</script>