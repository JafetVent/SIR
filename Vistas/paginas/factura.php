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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<div class="row">
    
    
<div class="col" >
    <form class="form-inline" action="/action_page.php">

    <input class="form-control mr-sm-2" type="text" placeholder="Factura">
    <a  class="btn btn-success" href="index.php?pagina=busqueda&idInvoice=<?php echo $value["idInvoice"]; ?>"  class="btn">Buscar</a>
  </form>
</div>

<div class="col">
    
<form class="form-inline" action="/action_page.php">

    <input class="form-control mr-sm-2" type="text" placeholder="Fecha">
    <a  class="btn btn-success" href="index.php?pagina=busqueda&idInvoice=<?php echo $value["idInvoice"]; ?>"  class="btn">Buscar</a>
  </form>

</div>

<div >
  <form class="form-inline">
    <a  class="btn btn-success" href="index.php?pagina=agregarFactura"  class="btn">Agregar Factura</a>
  </form>
</div>

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
                            <a href="index.php?pagina=editar&id=<?php echo $value["idInvoice"]; ?>"  class="btn btn-warning"><i class="far fa-edit"></i></a>
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