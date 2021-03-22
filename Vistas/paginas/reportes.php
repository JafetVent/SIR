<?php

if (isset($_GET["idInvoice"])) {
    $item = "idInvoice";
    $valor = $_GET["idInvoice"];
$Reporte1 = ControladorFormularios::ctrSeleccionarRegistrosReporte($item, $valor);
    
    }

$Reporte = ControladorFormularios::ctrSeleccionarRegistrosReporte(null,null,null);

var_dump($Reporte1);


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
                Factura
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
    <tbody>
        <?php foreach ($Reporte as $key => $value): ?> 
            <tr>
                <td>
                    <?php echo ($key+1); ?>
                </td>
                <td>
                    <?php echo $value["idFactura"];?>
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
</div>