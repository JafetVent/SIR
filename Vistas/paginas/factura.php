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

$Factura = ControladorFormularios::ctrSeleccionarRegistros(null, null, null);


?>

<a href="index.php?pagina=salir">logut</a>

<div class="container">
<?php if (isset($_GET["pagina"])): ?>
                            <?php if ($_GET["pagina"]=="salir"): ?>
                             <li class="nav-item">
                                <a class="nav-link active" href="index.php?pagina=salir">
                                    Salir
                                </a>
                            </li> 
                            <?php endif ?>
                            <?php endif ?>
                        </div>

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
    <tbody>
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
                        <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>"  class="btn btn-warning"><i class="far fa-edit"></i></a>
                        </div>

                        <form method="POST">
                            <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">

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