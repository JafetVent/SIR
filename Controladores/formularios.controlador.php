<?php 
class ControladorFormularios{

	/*Inicio de sesion*/
	public function ctrIngreso(){

		if(isset($_POST["ingresoUsuario"])){

			$tabla = "usuario";
			$item = "noTrabajador";
			$valor = $_POST["ingresoUsuario"];
			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
			if ($respuesta["noTrabajador"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $_POST["ingresoPassword"]){
				
				$_SESSION["validarIngreso"]="ok";



				echo '<script>

				if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}

				window.location = "index.php?pagina=factura";

				</script>';

			}else{
				echo '<script>

				if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}

				</script>';

				echo '<div class="alert alert-danger">Error al ingresar al sistema, el usuario y/o contraseña no coinciden.</div>';
			}
		}
	}


	/*SELECCIONAR REGISTROS*/

	static public function ctrSeleccionarRegistrosFactura($item, $valor){

		$tabla = "factura";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosVF($tabla, $item, $valor);

		return $respuesta;
		
	}
	

	static public function ctrSeleccionarRegistrosParte($item, $valor){

		$tabla = "parte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosParteVista($item, $valor){

		$tabla = "parte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosParteVista($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosReporte($item, $valor){

		$tabla = "reporte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosReporteV($item, $valor){

		$tabla = "facturas_parte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosV($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosReporteVarPar($item, $valor){

		$tabla = "valoresinsp";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosVarPar($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosReporteR($item, $valor){

		$tabla = "reporte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosR($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosFacturaR($item, $valor){

		$tabla = "factura";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosF($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosReporteInspeccion($item, $valor){

		$tabla = "reporte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosReporteInspeccion($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosVistaReporte($item, $valor){

		$tabla = "reporte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosVistaReporte($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosVistaReporteCaracteristicas($item, $valor){

		$tabla = "reporte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosVistaReporteCaracteristicas($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosVistaInspeccion($item, $valor){

		$tabla = "reporte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosVistaInspeccion($tabla, $item, $valor);

		return $respuesta;
		
	}


		/*=============================================
	Registro
	=============================================*/
	static public function ctrRegistro(){
		if(isset($_POST["registroParte"]) ){
			$dir_subida = 'Imagenes/Partes/';
			$fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);

			if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
				$tabla = "parte";
				$datos = array(
				"noParte" => $_POST["registroParte"],
				"proveedor" => $_POST["registroProveedor"],
				"subproveedor" => $_POST["registroSubProveedor"],
				"familia" => $_POST["registroFamilia"],
				"descripcion" => $_POST["registroDescripcion"],
				"ruta_imagen" => $fichero_subido
				 );

			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

} 
		return $respuesta;
		
		}
	
}

static public function ctrRegistroF(){
		if(isset($_POST["registroFactura"]) ){
			$dir_subida = 'Imagenes/Facturas/';
			$fichero_subido = $dir_subida . basename($_FILES['myfile']['name']);

			if (move_uploaded_file($_FILES['myfile']['tmp_name'], $fichero_subido)) {
				$tabla = "factura";
				$datos = array(
				"idInvoice" => $_POST["registroFactura"],
				"ruta_factura" => $fichero_subido,
				"fecha" => $_POST["registroFecha"]				
				 );

			$respuesta = ModeloFormularios::mdlRegistroF($tabla, $datos);


} 
		return $respuesta;
		
		}
	
}

static public function ctrRegistroFP(){

	if(isset($_POST["insertar"])){
	
		$tabla = "facturas_parte";
	
		$datos = array("idInvoice" => $_POST['idInvoice'], 
					   "noParte" => $_POST['noParte']);

		$respuesta = ModeloFormularios::mdlRegistroFP($tabla, $datos);

		return $respuesta;
	}
}

static public function ctrRegistroC(){

	if(isset($_POST["insertar"])){
	
		$tabla = "valoresinsp";
	
		$datos = array("noParte" => $_POST['noParte'],
					   "caracteristicas" => $_POST['caracteristicas'], 
					   "especificacion" => $_POST['especificacion'],
					   "equipo" => $_POST['equipo'],
					   "toleranciamin" => $_POST['toleranciamin'],
					   "toleranciamax" => $_POST['toleranciamax']);

		$respuesta = ModeloFormularios::mdlRegistroC($tabla, $datos);

		return $respuesta;
	}
}


/*Eliminar registro*/
	public function ctrEliminarRegistro(){
		if (isset($_POST["eliminarRegistro"])) {

			$tabla = "facturas_parte";
			$valor = $_POST["eliminarRegistro"];

			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

			if ($respuesta=="ok") {
				echo '<script>

				if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}

				window.location = "index.php?pagina=pagina=reporteInspeccion&id=<?php echo $value["idInvoice"]; ?>";

				</script>';
			}

			return $respuesta;
		}
	}

/*Guardar Registro inspecciones*/
	// public function ctrGuardarRegistro(){
	// 	if(isset($_POST["guardarRegistro"])){

	// 		$tabla = "inspecciones";

	// 		$datos = array("idReporte" => $_POST["idReporte"],
	// 			           "i1" => $_POST["i1"],
	// 			           "i2" => $_POST["i2"],
	// 			           "i3" => $_POST["i3"],
	// 			           "i4" => $_POST["i4"],
	// 			           "i5" => $_POST["i5"]);

	// 		$respuesta = ModeloFormularios::mdlGuardarRegistro($tabla, $datos);

	// 		return $respuesta;

	// 	}

	// }

	/*Guardar Registro Reporte*/
	public function ctrGuardarRegistroR(){
		if(isset($_POST["guardarRegistroR"])){

			$tabla = "reporte";
			$item = "idFacPar";
			$valor = $_POST["idFacPar"];

			$datos = array("fecha" => $_POST["registroFecha"],
				           "fechafifo" => $_POST["registroFechafifo"],
				           "noCaja" => $_POST["registrocaja"],
				           "turno" => $_POST["turno"],
				           "estatus" => $_POST["estatus"],
				           "observacion" => $_POST["observacion"],
				       	   "idReporte" => $_POST["idReporte"],
				           "i1" => $_POST["i1"],
				           "i2" => $_POST["i2"],
				           "i3" => $_POST["i3"],
				           "i4" => $_POST["i4"],
				           "i5" => $_POST["i5"]);

			$respuesta = ModeloFormularios::mdlGuardarRegistroR($tabla, $datos, $item, $valor);

			return $respuesta;

		}

	}


}



?>



