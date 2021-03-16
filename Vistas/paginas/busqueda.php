<?php

if(isset($_GET["idInvoice"])){

	$item = "idInvoice";
	$valor = $_GET["idInvoice"];

	$Factura = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);

}

?>