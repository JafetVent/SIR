<?php
if (isset($_GET["id"])) {
$item = "idFacPar";
$valor = $_GET["id"];
$Parte = ControladorFormularios::ctrSeleccionarRegistrosParteVista($item, $valor);
$reporte = ControladorFormularios::ctrSeleccionarRegistrosReporteInspeccion($item, $valor);
}
?>
<style type="text/css">
	
	img {
border-radius: 3%;
}
</style>



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
	<form>
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
		</div>
	</form>
</div>
<!-- <div class="container py-5">
			<form class="form-inline" action="/action_page.php">
						<label for="fecha"> Fecha: </label>
		<input type="date" name="registroFecha" step="1" min="" max="" value="<?php echo date("Y-m-d");?>" id="fecha">
		<label for="fechafifo"> FechaFifo</label>
		<input type="date" name="registroFechafifo" step="1" min="" max="" value="<?php echo date("Y-m-d");?>" id="fechafifo">
		<label for="noCaja"> No.caja: </label>
		<input type="text" name="registrocaja" id="nocaja">
		<label for="turno"> Turno: </label>
		<input list="turno" name="turno">
	</form>
</div> -->
<datalist id="turno">
<option value="A">
	<option value="B">
		</datalist>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
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
					<?php foreach ($reporte as $key => $value): ?>
					<tr>
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
									<input type="hidden" value="<?php echo $value["idReporte"]; ?>" name="guardarRegistro">
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
			<div class="container py-3">
				<form class="form-inline" action="/action_page.php">
					<div class="form-group">
						<label for="estatus"> Estatus: </label>
						<input list="estatus" name="estatus">
					</div>
					<datalist id="estatus">
					<option value="AA">
						<option value="NA">
							<option value="AO">
								</datalist>
								<div class="form-group">
									<label for="observacion"> Observaciones: </label>
									<input type="text" name="observacion" id="observacion">
								</div>
							</form>
						</div>
						<div class="d-flex justify-content-center h-100 d-inline-block p-2">
							<input type="submit" name="insertar" value="Guardar" class="btn btn-success"/>
							<button id="adicional" name="adicional" type="button" class="btn btn-danger"> Cancelar </button>
						</div>