<div class="d-flex justify-content-center text-center">


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
                        
                    </tr>
                </thead>
            </table>

        </div>
        


		<?php 

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO NO ESTÁTICO 
		=============================================*/
		
		// $registro = new ControladorFormularios();
		// $registro -> ctrRegistro();

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO ESTÁTICO 
		=============================================*/

		$registro = ControladorFormularios::ctrRegistro();

		if($registro == "ok"){

			echo '<script>

				if ( window.history.replaceState ) {

					window.history.replaceState( null, null, window.location.href );

				}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
		
		}

		?>
		
