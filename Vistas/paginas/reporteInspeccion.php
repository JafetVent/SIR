<?php
if (isset($_GET["id"])) {
$item = "idFacPar";
$valor = $_GET["id"];
$Parte = ControladorFormularios::ctrSeleccionarRegistrosParteVista($item, $valor);
$reporte = ControladorFormularios::ctrSeleccionarRegistrosReporteInspeccion($item, $valor);
}

echo $_SESSION['usuario'];
?>
<style type="text/css">
	
	img {
border-radius: 3%;
}
</style>


<form method="post">
<div class="container-fluid py-5">
	<div class="row">
		<div  style="background-color:white-space: ;">
			<?php echo "<img src='".$Parte["ruta_imagen"]."' height ='200' width ='320.33' >";?>
		</div>
		<div  style="background-color:white;">
			<h3> No. Parte: <?php echo $Parte["noParte"];?></h3>
			<h4> Proveedor: <?php echo $Parte["proveedor"];?></h4>
			<h5> Subproveedor: <?php echo $Parte["subproveedor"];?></h5>
		</div>
	</div>
</div>

<div class="container">
	
		<div class="form-group row">
			<div class="col-xs-2">
				<label for="fecha"> <b>Fecha:</b> </label>
				<input class="form-control" id="fecha" type="date" name="registroFecha" step="1" min="" max="" value="<?php echo date("Y-m-d");?>" id="fecha">
			</div>
			<div class="col-xs-2">
				<label for="fechafifo"> <b>Fecha FIFO:</b> </label>
				<input class="form-control" id="fechafifo" type="date" name="registroFechafifo" step="1" min="" max="" value="<?php echo date("Y-m-d");?>" id="fechafifo">
			</div>
			<div class="col-xs-2">
				<label for="noCaja"> <b>No.caja:</b> </label>
				<input class="form-control" id="noCaja" type="text" name="registrocaja" id="nocaja">
			</div>
			<div class="col-xs-2">
				<label for="turno"> <b>Turno:</b> </label>
				<input class="form-control" list="turno" name="turno">
			</div>
			<div class="col-xs-2">
				<label for="auditor"> <b>Auditor:</b> </label>
				<input class="form-control" list="auditor" name="auditor" value="<?php echo $_SESSION['usuario'];?>">
			</div>
		</div>
	
</div>

<datalist id="turno">
	<option value="A">
	<option value="B">
</datalist>

		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>
							 
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
							
						</th>
						<th>
							
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
					<?php foreach ($reporte as $key => $value): ?>
					<tr>
						<td style="visibility:hidden;">
							<?php echo $value["idReporte"];?>
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
							<input type="hidden" name="idReporte[]" value="<?php echo $value["idReporte"];?>"/>
						</td>
						<td>
							<input type="hidden" name="idFacPar" value="<?php echo $value["idFacPar"];?>"/>
						</td>							
						<td>
							<input type="text" required name="i1[]" id="i1">
						</td>
						<td>
							<input type="text" required name="i2[]" id="i2">
						</td>
						<td>
							<input type="text" required name="i3[]" id="i3">
						</td>
						<td>
							<input type="text" required name="i4[]" id="i4">
						</td>
						<td>
							<input type="text" required name="i5[]" id="i5">
						</td>
						</tr>
						
						<?php endforeach?>
					</tbody>
				</table>
			</div>


			<div class="container py-3">
				
					<div class="form-group">
						<label for="estatus"> Estatus: </label>
						<input list="estatus" name="estatus">
					</div>

					<datalist id="estatus">
						<option value="AA"></option>
						<option value="NA"></option>
						<option value="AO"></option>
					</datalist>

					<div class="form-group">
						<label for="observacion"> Observaciones: </label>
						<input type="text" name="observacion" id="observacion">
					</div>					
					
			</div>

			<div class="d-flex justify-content-center h-100 d-inline-block p-2">
				<input type="submit" name="guardarRegistroR" class="btn btn-success"/>
				<button id="adicional" name="adicional" type="button" class="btn btn-danger"> Cancelar </button>
			</div>
				
		</form>	
			

		
		<?php
		$registro = controladorFormularios::ctrGuardarRegistroR();
		//$registro1 = controladorFormularios::ctrGuardarRegistro();
        //echo $registro;

        if ($registro == "ok" ) {

            echo '<script>

                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }

            </script>';

            echo '<div class="alert alert-success">El reporte se ha guardado</div>';
        }
									?>
									