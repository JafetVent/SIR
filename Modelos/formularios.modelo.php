<?php
 
require_once "conexion.php";

class ModeloFormularios{

/*=============================================
	Registro
	=============================================*/

	static public function mdlRegistro($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(noParte,proveedor,subproveedor,descripcion, ruta_imagen) VALUES (:noParte, :proveedor,:subproveedor,:descripcion,:ruta_imagen)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		$stmt->bindParam(":noParte", $datos["noParte"], PDO::PARAM_STR);	
		$stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":subproveedor", $datos["subproveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":ruta_imagen", $datos["ruta_imagen"], PDO::PARAM_STR);
		



		if($stmt->execute()){

			return "ok";

		}else{

			//print_r(Conexion::conectar()->errorInfo());

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

			//print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	static public function mdlGuardarRegistroR($tabla, $datos, $item, $valor){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.



		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET noTrabajador = :noTrabajador, fecha = :fecha, fechafifo = :fechafifo, noCaja = :noCaja, turno = :turno, estatus = :estatus, observacion = :observacion WHERE $item = :$item");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":noTrabajador", $datos["noTrabajador"], PDO::PARAM_STR);	
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":fechafifo", $datos["fechafifo"], PDO::PARAM_STR);
		$stmt->bindParam(":noCaja", $datos["noCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
		$stmt->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO inspecciones (idReporte,i1, i2, i3, i4, i5) VALUES (:idReporte, :i1, :i2, :i3, :i4, :i5)");

		$arr_length = count($datos["idReporte"]);

				for ($i = 0; $i < $arr_length ; $i++){	
		$stmt1->bindParam(":idReporte", $datos["idReporte"][$i], PDO::PARAM_STR);	
		$stmt1->bindParam(":i1", $datos["i1"][$i], PDO::PARAM_STR);
		$stmt1->bindParam(":i2", $datos["i2"][$i], PDO::PARAM_STR);
		$stmt1->bindParam(":i3", $datos["i3"][$i], PDO::PARAM_STR);
		$stmt1->bindParam(":i4", $datos["i4"][$i], PDO::PARAM_STR);
		$stmt1->bindParam(":i5", $datos["i5"][$i], PDO::PARAM_STR);
		$stmt1->execute();

		}

		

		if($stmt->execute()){

			return "ok";

		}else{

			//print_r(Conexion::conectar()->errorInfo());

		}

		
		$stmt->close();
		$stmt = null;

		$stmt1 = null;	

	}


		static public function mdlGuardarRegistro($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idReporte,i1, i2, i3, i4, i5) VALUES (:idReporte, :i1, :i2, :i3, :i4, :i5)");

		$arr_length = count($datos["idReporte"]);

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
		for ($i = 0; $i < $arr_length ; $i++){	
		$stmt->bindParam(":idReporte", $datos["idReporte"][$i], PDO::PARAM_STR);	
		$stmt->bindParam(":i1", $datos["i1"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":i2", $datos["i2"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":i3", $datos["i3"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":i4", $datos["i4"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":i5", $datos["i5"][$i], PDO::PARAM_STR);
		$stmt->execute();

		}

		

		if($stmt->execute()){

			return "ok";

		}else{

			//print_r(Conexion::conectar()->errorInfo());

		}
		$stmt = null;	

	}

	static public function mdlRegistroFP($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$arr_length = count($datos["idInvoice"]);
		 //echo " largo del arreglo: ".$arr_length;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idInvoice, noParte) VALUES (:idInvoice, :noParte);");		

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		// foreach ($datos["idInvoice"] as $i => $value) {
		// $stmt->bindParam(":idInvoice", $datos["idInvoice"][$i], PDO::PARAM_STR);	
		// $stmt->bindParam(":noParte", $datos["noParte"][$i], PDO::PARAM_STR);

		// $stmt->execute();
		// }


		for ($i = 0; $i < $arr_length ; $i++){
		$stmt->bindParam(":idInvoice", $datos["idInvoice"][$i], PDO::PARAM_STR);	
		$stmt->bindParam(":noParte", $datos["noParte"][$i], PDO::PARAM_STR);
		// echo " idInvoice: ".$datos["idInvoice"][$i];
		// echo " no. Parte: ".$datos["noParte"][$i];
		$stmt->execute();
		
		// var_dump($datos["idInvoice"][$i]);
		// var_dump($stmt);
	
		}

		if($stmt->execute()){		

			return "ok";


		 }else{

		 	//print_r(Conexion::conectar()->errorInfo());

		 }
		 
		  $stmt = null;
		 
		
		}


	static public function mdlRegistroC($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$arr_length = count($datos["noParte"]);
		//  echo " largo del arreglo: ".$arr_length;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(noParte, caracteristicas, especificacion, equipo, toleranciamin, toleranciamax) 
			                                   VALUES (:noParte, :caracteristicas, :especificacion, :equipo, :toleranciamin, :toleranciamax);");		

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		// foreach ($datos["idInvoice"] as $i => $value) {
		// $stmt->bindParam(":idInvoice", $datos["idInvoice"][$i], PDO::PARAM_STR);	
		// $stmt->bindParam(":noParte", $datos["noParte"][$i], PDO::PARAM_STR);

		// $stmt->execute();
		// }


		for ($i = 0; $i < $arr_length ; $i++){	
		$stmt->bindParam(":noParte", $datos["noParte"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":caracteristicas", $datos["caracteristicas"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":especificacion", $datos["especificacion"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":equipo", $datos["equipo"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":toleranciamin", $datos["toleranciamin"][$i], PDO::PARAM_STR);
		$stmt->bindParam(":toleranciamax", $datos["toleranciamax"][$i], PDO::PARAM_STR);
		 // echo " idInvoice: ".$datos["idInvoice"][$i];
		 // echo " no. Parte: ".$datos["noParte"][$i];
		$stmt->execute();
		
		 // var_dump($datos["idInvoice"][$i]);
		 // var_dump($stmt);
	
		}

		if($stmt->execute()){		

			return "ok";


		 }else{

		 	//print_r(Conexion::conectar()->errorInfo());

		 }

		  $stmt = null;
		 
		
		}



/*=============================================
	Seleccionar Registro
	=============================================*/


	
	static public function mdlSeleccionarRegistros($tabla, $item, $valor){

		if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla");
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

	static public function mdlSeleccionarRegistrosVF($tabla, $item, $valor){	
			$stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha  FROM $tabla");
			$stmt -> execute();

			return $stmt -> fetchALL();
	}

	static public function mdlSeleccionarRegistrosV($tabla, $item, $valor){		
			$stmt = Conexion::conectar()->prepare("SELECT facturas_parte.idFacPar, idInvoice, noParte, estatus FROM $tabla JOIN reporte on reporte.idFacPar = facturas_parte.idFacPar WHERE $item = :$item");

							//SELECT DISTINCT * FROM $tabla JOIN reporte on reporte.idFacPar = facturas_parte.idFacPar WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			$data = array();
			while ($row =  $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;

	}

	static public function mdlSeleccionarRegistrosVarPar($tabla, $item, $valor){		
			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT caracteristicas, especificacion, equipo, toleranciamin, toleranciamax FROM $tabla JOIN parte on parte.noParte = valoresinsp.noParte WHERE valoresinsp.$item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			$data = array();
			while ($row =  $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;

	}

	static public function mdlSeleccionarRegistrosR($tabla, $item, $valor){	
			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla JOIN facturas_parte on reporte.idFacPar = facturas_parte.idFacPar");
			$stmt -> execute();

			return $stmt -> fetchALL();
	}

	static public function mdlSeleccionarRegistrosReporteInspeccion($tabla, $item, $valor){	
			$stmt = Conexion::conectar()->prepare("	SELECT * FROM $tabla 
													JOIN facturas_parte ON reporte.idFacPar = facturas_parte.idFacPar
													JOIN parte ON facturas_parte.noParte = parte.noParte
													JOIN valoresinsp ON parte.noParte = valoresinsp.noParte
													WHERE facturas_parte.$item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			$data = array();
			while ($row =  $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;
	}

	static public function mdlSeleccionarRegistrosVistaReporte($tabla, $item, $valor){	
			$stmt = Conexion::conectar()->prepare("	SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha, DATE_FORMAT(fechafifo, '%d/%m/%Y') AS fechafifo FROM $tabla JOIN usuario ON reporte.noTrabajador = usuario.noTrabajador
													WHERE reporte.$item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			$data = array();
			while ($row =  $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;
	}

	static public function mdlSeleccionarRegistrosVistaReporteCaracteristicas($tabla, $item, $valor){	
			$stmt = Conexion::conectar()->prepare("	SELECT * FROM $tabla
													JOIN facturas_parte ON reporte.idFacPar = facturas_parte.idFacPar
													JOIN parte ON facturas_parte.noParte = parte.noParte
													JOIN valoresinsp ON parte.noParte = valoresinsp.noParte
													WHERE facturas_parte.$item = :$item ");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			$data = array();
			while ($row =  $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;
	}

	static public function mdlSeleccionarRegistrosVistaInspeccion($tabla, $item, $valor){	
			$stmt = Conexion::conectar()->prepare("	SELECT DISTINCT caracteristicas, especificacion, equipo, toleranciamin, toleranciamax, i1, i2, 									    i3, i4, i5 FROM $tabla
													JOIN facturas_parte ON reporte.idFacPar = facturas_parte.idFacPar
													JOIN parte ON facturas_parte.noParte = parte.noParte
													JOIN valoresinsp ON parte.noParte = valoresinsp.noParte
													JOIN inspecciones on reporte.idReporte = inspecciones.idReporte
													WHERE reporte.$item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			$data = array();
			while ($row =  $stmt -> fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			return $data;
	}



static public function mdlSeleccionarRegistrosParteVista($tabla, $item, $valor){

		if ($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();

			return $stmt -> fetchALL();

				
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla 
													JOIN facturas_parte ON parte.noParte = facturas_parte.noParte
													WHERE facturas_parte.$item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();
		}

		$stmt -> close();

		$stmt = null;
				
	}


/*=============================================
	Eliminar Registro
	=============================================*/
	static public function mdlEliminarRegistro($tabla, $valor){
	
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idFacPar = :idFacPar");

		$stmt->bindParam(":idFacPar", $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

}
}
	
?>
