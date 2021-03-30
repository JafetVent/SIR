<?php
if (isset($_GET["id"])) {
$item = "idFactura";
$valor = $_GET["id"];
$reporte = ControladorFormularios::ctrSeleccionarRegistrosReporteV($item, $valor);
}
?>
<div class="container py-5">
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div>
            <div>
                <div class="col">
                    <input class="form-control  mr-sm-2" id="myInput" type="text" placeholder="Buscar">
                </div>
            </nav>
            <table class="table table-striped">
                <thead>
                    <tr>
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
                        <td>
                            <?php echo $value["noParte"];?>
                        </td>
                        <td>
                            <?php echo $value["estatus"];?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <div class="px-1">
                                    <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>"  class="btn btn-warning"><i class="far fa-edit"></i></a>
                                </div>
                                <form method="POST">
                                    <input type="hidden" value="<?php echo $value["id"]; ?>" name="">
                                    <button type="submit"class="btn btn-info"><i class="fas fa-search"></i></button>
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