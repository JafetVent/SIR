<?php
if(!isset($_SESSION["validarIngreso"])){
echo '<script>window.location = "index.php?pagina=login";</script>';
return;
}else{
if($_SESSION["validarIngreso"] != "ok"){
echo '<script>window.location = "index.php?pagina=login";</script>';
return;
}

}
$Reporte = ControladorFormularios::ctrSeleccionarRegistrosReporteR(null,null,null);
?>
<div class="container py-5">
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div>
            <div class="col">
                <input class="form-control  mr-sm-2" id="myInput" type="text" placeholder="Buscar">
            </div>
        </nav>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Reporte
                    </th>
                    <th>
                        Factura
                    </th>
                    <th>
                        No.Parte
                    </th>
                    <th>
                        Estatus
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Acciones
                    </th>
                    
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach ($Reporte as $key => $value): ?>
                <tr>
                    <td>
                        <?php echo ($key+1); ?>
                    </td>
                    <td>
                        <?php echo $value["idInvoice"];?>
                    </td>
                    <td>
                        <?php echo $value["noParte"];?>
                    </td>
                    <td>
                        <?php echo $value["estatus"];?>
                    </td>
                    <td>
                        <?php echo $value["fecha"];?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <div class="px-1">
                                 <a href="index.php?pagina=reporteInspeccion&id=<?php echo $value["noParte"]; ?>"  class="btn btn-warning"><i class="far fa-edit"></i></a>
                            </div>
                            <form method="POST">
                                <input type="hidden" value="" name="">
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
</div>
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