<?php
if (isset($_GET["id"])) {
$item = "idFacPar";
$valor = $_GET["id"];
$Parte = ControladorFormularios::ctrSeleccionarRegistrosParteVista($item, $valor);
$reporte = ControladorFormularios::ctrSeleccionarRegistrosVistaReporte($item, $valor);
$inspeccion = ControladorFormularios::ctrSeleccionarRegistrosVistaInspeccion($item, $valor);
$inspeccion1 = ControladorFormularios::ctrSeleccionarRegistrosVistaReporteCaracteristicas($item, $valor);
}
?>
<style type="text/css">
	
	img {
border-radius: 3%;
}
</style>
<div class="container py-3">
<div class="row">
	<div  class="col-xs-2">
		<?php echo "<img src='".$Parte["ruta_imagen"]."' height ='200' width ='320.33' >";?>
	</div>
	<div class="col">
		<h3>No. Parte: <?php echo $Parte["noParte"];?></h3>
		<h4>Proveedor: <?php echo $Parte["proveedor"];?></h4>
		<h5>Subproveedor: <?php echo $Parte["subproveedor"];?></h5>
	</div>
	<div class="col">
		<h1>FO-C-03</h1>
	</div>

</div>
</div>

<div class="container py-3">

	<?php foreach ($reporte as $key => $value): ?>
	<div class="row">
		<!-- <div class="container col">
		<h5>idReporte: </h5>
		<dl>
    		<dt><?php echo $value["idReporte"];?></dt>
  		</dl> 
  		</div> -->

		<div class="container col">
		<h5>Fecha: </h5>
		<dl>
    		<dt><?php echo $value["fecha"];?></dt>
  		</dl> 
  		</div>

  		<div class="container col">
		<h5>Fecha FIFO: </h5>
		<dl>
		<dt><?php echo $value["fechafifo"];?></dt>
  		</dl> 
  		</div>

  		<div class="container col">
		<h5>No. Caja: </h5>
		<dl>
    		<dt><?php echo $value["noCaja"];?></dt>
  		</dl> 
  		</div>

  		<div class="container col">
		<h5>Turno: </h5>
		<dl>
    		<dt><?php echo $value["turno"];?></dt>
  		</dl> 
  		</div>

  		 <div class="container col">
		<h5>Auditor: </h5>
		<dl>
    		<dt><?php echo $value["nombre"];?> <?php echo $value["apellido"];?></dt>
  		</dl> 
  		</div>
	</div>
	
	<?php endforeach?>
</div>


<div class="row">

        <div class="col-sm-8">
        <font size="2" >
            <table class="table table-bordered">
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
                    </tr>
                </thead>
                
                <tbody>
        <tr>
 <?php foreach ($inspeccion as $key => $value): ?>
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
          </tr>
<?php endforeach?>
      </tbody>
            </table>
            </font>
        </div>
        <div class="col-sm-4">
        	<font size="2" >
            <table class="table table-bordered">
                <thead>
                    <tr>
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
                <tbody>
<?php foreach ($inspeccion1 as $key => $value): ?>
        <tr>
          <td>
						<?php echo $value["i1"];?>
					</td>
					<td>
						<?php echo $value["i2"];?>
					</td>
					<td>
						<?php echo $value["i3"];?>
					</td>
					<td>
						<?php echo $value["i4"];?>
					</td>
					<td>
						<?php echo $value["i5"];?>
					</td>
          </tr>
<?php endforeach?>
      </tbody>
            </table>
            </font>
        </div>
    </div>
			<?php foreach ($reporte as $key => $value): ?>
				<div class="container py-3">

				<div class="row">				
					<div class="col">
						<h5>Estatus: <?php echo $value["estatus"];?></h5><br>
					</div>
					<div class="col">
						<h5>Observaciones: <?php echo $value["observacion"];?></h5><br>
					</div>				
				</div>
			</div>
			<?php endforeach?>

			<div class="d-flex justify-content-center h-100 d-inline-block p-2">
				<a href="index.php?pagina=editar&id=<?php echo $Parte["idInvoice"]; ?>"  class="btn btn-success">Regresar</i></a>
			</div>
			
