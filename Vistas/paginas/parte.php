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


$Parte = ControladorFormularios::ctrSeleccionarRegistrosParte(null, null, null);
?>
<div class="container py-5">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="col">
            <input class="form-control  mr-sm-2" id="myInput" type="text" placeholder="Buscar No.Parte">
        </div>
        <div class="col-sm-8">
            <form class="form-inline" action="index.php?pagina=agregarParte">
                <a  class="btn btn-success" href="index.php?pagina=agregarParte"  class="btn btn-warning">Agregar No.Parte</a>
            </form>
        </div>
    </nav>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    No. Parte
                </th>
                <th>
                    Proveedor
                </th>
                <th>
                    Subproveedor
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Imagen
                </th>
                <th>
                    Acciones
                </th>
                
            </tr>
        </thead>
        <tbody id="myTable">
            <?php foreach ($Parte as $key => $value): ?>
            <tr>
                <td>
                    <?php echo $value["noParte"];?>
                </td>
                <td>
                    <?php echo $value["proveedor"];?>
                </td>
                <td>
                    <?php echo $value["subproveedor"];?>
                </td>
                <td>
                    <?php echo $value["descripcion"];?>
                </td>
                <td>
                    <?php echo "<img src='".$value["ruta_imagen"]."' height ='100' width ='100' >";?>
                </td>
                <td>
                    <div class="btn-group">
                        <div class="px-1">
                            <a href="index.php?pagina=valoresParte&id=<?php echo $value["noParte"]; ?>"  class="btn btn-warning"><i class="fas fa-plus-circle"></i></a>
                        </div>
                        <form method="POST">
                            <input type="hidden" value="<?php echo $value["noParte"]; ?>" name="eliminarRegistro">
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