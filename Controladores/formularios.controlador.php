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

	static public function ctrSeleccionarRegistros($item, $valor){

		$tabla = "factura";
		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
		
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