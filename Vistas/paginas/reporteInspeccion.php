<?php 
if (isset($_GET["id"])) {
$item = "noParte";
$valor = $_GET["id"];
$Parte = ControladorFormularios::ctrSeleccionarRegistrosParte($item, $valor);
}

?>

<div class="container py-5">
<?php echo "<img src='".$Parte["ruta_imagen"]."' height ='200' width ='300' >";?>
</div>
