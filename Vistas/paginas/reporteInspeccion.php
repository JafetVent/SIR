<?php 
if (isset($_GET["id"])) {
$item = "noParte";
$valor = $_GET["id"];
$Parte = ControladorFormularios::ctrSeleccionarRegistrosParte($item, $valor);
$varPar = ControladorFormularios::ctrSeleccionarRegistrosReporteVarPar($item, $valor);
$reporte = ControladorFormularios::ctrSeleccionarRegistrosReporte($item, $valor);
}

?>
<style type="text/css">
	
	img {
  border-radius: 3%;
}
</style>

<div class="container-fluid">
    <div class="row">
    <div class="col-sm-4" style="background-color:white-space: ;">
        <?php echo "<img src='".$Parte["ruta_imagen"]."' height ='200' width ='300' >";?>
    </div>
    <div class="col-sm-8" style="background-color:white;">
        <h3> No. Parte: <?php echo $Parte["noParte"];?></h3>
        <h4>Proveedor: <?php echo $Parte["proveedor"];?></h4>
        <h5>Subproveedor: <?php echo $Parte["subproveedor"];?></h5>        
    </div>
    </div>
    <div class="container-fluid ">
    <form class="form-inline" action="/action_page.php">
  <label for="fecha"> Fecha: </label>
  <input type="date" name="registroFecha" step="1" min="" max="" value="<?php echo date("Y-m-d");?>" id="fecha">

  <label for="fechafifo"> FechaFifo</label>
  <input type="date" name="registroFechafifo" step="1" min="" max="" value="<?php echo date("Y-m-d");?>" id="fechafifo">

  <label for="noCaja"> No.caja: </label>
  <input type="text" name="registrocaja" id="nocaja">

  <label for="turno"> Turno: </label>
  <input list="turno" name="turno" id="turno">
	</form>
	 <datalist id="turno">
    
        <option value="A">
        <option value="B">
    
</datalist>
<div class="table-responsive">
 <table class="table table-striped">
                <thead>
                    <tr>
                    	<th>
                            #
                        </th>
                        <th>
                            Caracteristica
                        </th>
                        <th>
                            Especificación
                        </th>
                        <th>
                            Equipo de Medición
                        </th>
                        <th>
                            Tolerencia Min
                        </th>
                        <th>
                            Tolerancia Max
                        </th>
                        <th>
                            I1
                        </th>
                        <th>
                            I2
                        </th>
                        <th>
                            I3
                        </th>
                        <th>
                            I4
                        </th>
                        <th>
                            I5
                        </th>
                        
                    </tr>
                </thead>

                    <tbody id="myTable">
                    <?php foreach ($varPar as $key => $value): ?>
                    <tr>
                    	<td>
                            <?php echo $reporte["idReporte"];?>
                        </td>
                        <td>
                            <?php echo $value["caracteristicas"];?>
                        </td>
                        <td>
                            <?php echo $value["especificacion"];?>
                        </td>
                        <td>
                            <?php echo $value["equipo"];?>
                        </td>
                        <td>
                            <?php echo $value["toleranciamin"];?>
                        </td>
                        <td>
                            <?php echo $value["toleranciamax"];?>
                        </td>
                        <td>
                            <input type="text" name="inspeccion1" id="i1">
                        </td>
                        <td>
                            <input type="text" name="inspeccion2" id="i2">
                        </td>
                        <td>
                            <input type="text" name="inspeccion3" id="i3">
                        </td>
                        <td>
                            <input type="text" name="inspeccion4" id="i4">
                        </td>
                        <td>
                            <input type="text" name="inspeccion5" id="i5">
                        </td>
                        <td>
                        	 <div class="btn-group">
                        	 	<form method="POST">
                                    <input type="hidden" value="<?php echo $value["noParte"]; ?>" name="guardarRegistro">
                                    <button type="submit"class="btn btn-success"><i class="far fa-check-circle"></i></button>
                                    <?php
                                    $guardar = new ControladorFormularios();
                                    $guardar -> ctrGuardarRegistro();
                                    ?>
                                </form>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
<div>
	
</div>
    <form class="form-inline" action="/action_page.php">
  <label for="estatus"> Estatus: </label>
  <input list="estatus" name="estatus" id="estatus">
  
  <label for="observacion"> Observaciones: </label>
  <input type="text" name="observacion" id="observacion">
	</form>

	                <div class="btn-der">
                    <input type="submit" name="insertar" value="Guardar" class="btn btn-success"/>
                    <button id="adicional" name="adicional" type="button" class="btn btn-danger"> Cancelar </button>

                </div>
</div>

</div>

