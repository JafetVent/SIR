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

$Reporte = ControladorFormularios::ctrSeleccionarRegistrosReporte(null,null,null);
?>

<div class="container py-5">
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <div>
    <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="No.Parte">
    <button class="btn btn-success" type="submit">Buscar</button>    
  </form>
  </div>

<div class="col-sm-8">
<form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Estatus">
    <button class="btn btn-success" type="submit">Buscar</button>    
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
                Reporte
            </th>
            <th>
                Factura
            </th>
            <th>
                Estatus
            </th>
            <th>
                Acciones
            </th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Reporte as $key => $value): ?> 
            <tr>
                <td>
                    <?php echo ($key+1); ?>
                </td>
                <td>
                    <?php echo $value["idReporte"];?>
                </td>
                <td>
                    <?php echo $value["idFactura"];?>
                </td>
                <td>
                    <?php echo $value["estatus"];?>
                </td>

                <td>                           

                    <div class="btn-group">
                        <div class="px-1">
                            <a href=""  class="btn btn-warning"><i class="far fa-edit"></i></a>
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