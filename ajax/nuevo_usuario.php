<?php

	if (empty($_POST['correo_usua'])) {
           $errors[] = "Correo vacío";
        } else if (!empty($_POST['correo_usua'])){
	
		require_once ("../bd/conexion.php");
		
		// escaping, additionally removing everything that could be (html/javascript-) code
		$correo =$_POST["correo_usua"];
		$usuario =$_POST["usuario_usua"];
		$password =$_POST["password_usua"];
		// $confirPassword =$_POST["confirmpassword"];

		$sql="INSERT INTO `usuario`(`correo_usua`, `usuario_usua`, `password_usua) VALUES (?,?,?)";
		$sentencia = $db->prepare($sql);
		$sentencia->execute(array($correo, $usuario, $password ));
			if ($sentencia){
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
