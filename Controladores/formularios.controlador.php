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
		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosParte($item, $valor){

		$tabla = "parte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosReporte($item, $valor){

		$tabla = "reporte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
		
	}

	static public function ctrSeleccionarRegistrosReporteV($item, $valor){

		$tabla = "reporte";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistrosV($tabla, $item, $valor);

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

/*Eliminar registro*/
	public function ctrEliminarRegistro(){
		if (isset($_POST["eliminarRegistro"])) {

			$tabla = "registros";
			$valor = $_POST["eliminarRegistro"];

			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

			if ($respuesta=="ok") {
				echo '<script>

				if(window.history.replaceState){
					window.history.replaceState(null, null, window.location.href);
				}

				window.location = "index.php?pagina=inicio";

				</script>';
			}

			return $respuesta;
		}
	}


}



?>



