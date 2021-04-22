<?php
 
require_once "conexion.php";

class ModeloFormularios{
	/*=============================================
	Registro
	=============================================*/

	static public function mdlRegistro($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(noParte,proveedor,subproveedor,familia,descripcion, ruta_imagen) VALUES (:noParte, :proveedor,:subproveedor,:familia,:descripcion,:ruta_imagen)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":noParte", $datos["noParte"], PDO::PARAM_STR);	
		$stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":subproveedor", $datos["subproveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":familia", $datos["familia"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_imagen", $datos["ruta_imagen"], PDO::PARAM_STR);
		



		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	static public function mdlRegistroF($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idInvoice, ruta_factura, fecha) VALUES (:idInvoice, :ruta_factura, :fecha)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":idInvoice", $datos["idInvoice"], PDO::PARAM_STR);	
		$stmt->bindParam(":ruta_factura", $datos["ruta_factura"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	static public function mdlRegistroFP($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idInvoice, noParte) VALUES (:idInvoice, :noParte)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":idInvoice", $datos["idInvoice"], PDO::PARAM_STR);	
		$stmt->bindParam(":noParte", $datos["noParte"], PDO::PARAM_STR);

		

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

/*=============================================
	Seleccionar Registro
	=============================================*/


	
	static public function mdlSeleccionarRegistros($tabla, $item, $valor){

		if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();

			return $stmt -> fetchALL();

				
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();
		}

		$stmt -> close();

		$stmt = null;
				
	}

	static public function mdlSeleccionarRegistrosV($tabla, $item, $valor){		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN reporte on reporte.idFacPar = facturas_parte.idFacPar WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			$data = array();
			while ($row =  $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;

	}

	static public function mdlSeleccionarRegistrosR($tabla, $item, $valor){	
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN facturas_parte on reporte.idFacPar = facturas_parte.idFacPar");
			$stmt -> execute();

			return $stmt -> fetchALL();
	}

	static public function mdlSeleccionarRegistrosF($tabla, $item, $valor){	
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla JOIN reporte on factura.idFactura = reporte.idFactura");
			$stmt -> execute();

			return $stmt -> fetchALL();
	}
}

?>
