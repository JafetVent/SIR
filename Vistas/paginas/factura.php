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
$Factura = ControladorFormularios::ctrSeleccionarRegistrosFactura(null, null, null);
?>
<div class="container py-5">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="row">
            
            <div class="col">
                <input class="form-control  mr-sm-2" id="myInput" type="text" placeholder="Buscar por Factura/Fecha">
            </div>
            <form class="form-inline">
                <a  class="btn btn-success" href="index.php?pagina=agregarFactura"  class="btn">Agregar Factura</a>
            </form>
        </div>
    </nav>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Factura
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
            <?php foreach ($Factura as $key => $value): ?>
            <tr>
                <td>
                    <?php echo ($key+1); ?>
                </td>
                <td>
                    <?php echo $value["idInvoice"];?>
                </td>
                <td>
                    <?php echo $value["fecha"];?>
                </td>
                <td>
                    
                    <div class="btn-group">
                        <div class="px-1">
                            <a href="index.php?pagina=editar&id=<?php echo $value["idInvoice"]; ?>"  class="btn btn-warning"><i class="far fa-folder-open"></i></a>
                        </div>
                        
                        
                        
                        <form method="POST">
                            <input type="hidden" value="<?php echo $value["idInvoice"]; ?>" name="eliminarRegistro">
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