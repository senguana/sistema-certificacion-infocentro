<?php

	if (empty($_POST['correo_usua'])) {
           $errors[] = "Correo vacío";
        } else if (!empty($_POST['correo_usua'])){
		/* Connect To Database*/
		require_once ("../bd/conexion.php");//Contiene las variables de configuracion para conectar a la base de datos
		
		// escaping, additionally removing everything that could be (html/javascript-) code
		$correo =mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apellido =mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
		$cedula =mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));
		$provincia=mysqli_real_escape_string($con,(strip_tags($_POST["provincia"],ENT_QUOTES)));
		$ciudad =mysqli_real_escape_string($con,(strip_tags($_POST["ciudad"],ENT_QUOTES)));

		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$celular=mysqli_real_escape_string($con,(strip_tags($_POST["celular"],ENT_QUOTES)));

		$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		$referencia=mysqli_real_escape_string($con,(strip_tags($_POST["referencia"],ENT_QUOTES)));
		$estado=intval($_POST['estado']);
		$date_added=date("Y-m-d H:i:s");
		$sql="INSERT INTO `clientes`(`nombre_cliente`, `apellido_cliente`, `cedula_cliente`, `provincia`, `ciudad`, `email_cliente`, `telefono_cliente`, `celular_cliente`, `direccion_cliente`, `status_cliente`, `date_added`, `referencia_cliente`) VALUES ('$nombre','$apellido','$cedula','$provincia','$ciudad','$email', '$telefono','$celular','$direccion','$estado','$date_added','$referencia')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Cliente ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}

		if (isset($errors)){

			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong>
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){

				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>
