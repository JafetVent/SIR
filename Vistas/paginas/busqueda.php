<?php

if (isset($_GET["id"])) {
    $item = "idFactura";
    $valor = $_GET["id"];
    $reporte = ControladorFormularios::ctrSeleccionarRegistrosReporteFactura($item, $valor);


    echo $_GET["id"];
}

?>