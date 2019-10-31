<?php 
require_once './../bd/conexion.php';
require_once './../core/configGeneral.php';
// require_once './../clases/login.php';

if (isset($_POST['login'])) {
	if (empty($_POST['username'])) {
		 $errors[] = "El campo de nombre de usuario estaba vacío.";

	}elseif (empty($_POST['password'])) {
		$errors[] = "El campo de contraseña estaba vacío.";
		
	}elseif (!empty($_POST['username']) && !empty($_POST['password'])) {
		 $user_name = $_POST['username'];
         $password = $_POST['password'];

		$sql = "SELECT * FROM usuario WHERE username_usua =:username_usua";
		$result = $db->prepare($sql);
		$result->execute(array(':username_usua' => $user_name));
		$row=$result->fetch(PDO::FETCH_ASSOC);

		if ($result->rowCount() >0) {
            if (password_verify($password, $row['password_usua'])) {
            	
                session_start();	   
                $_SESSION['id_usua'] = $row['id_usua'];
                $_SESSION['username_usua'] = $row['username_usua'];
                $_SESSION['nombre_usua'] = $row['nombre_usua'];
                $_SESSION['apellido_usua'] = $row['apellido_usua'];
                $_SESSION['correo_usua'] = $row['correo_usua'];
                $_SESSION['user_login_status'] = 1;
                
                header("location: ./home.php");
                 exit;

            }else{
            	$errors[] = "Usuario y/o contraseña no coinciden.";
            }

		}else{
			$errors[] = "Usuario no existe";
		}
	}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo SERVERURL; ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['<?php echo SERVERURL; ?>assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<?php
				
				if (isset($_POST['login'])) {
					if ($errors) {
						?>
						<div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i>
						<?php
						foreach ($errors as $error) {
							echo $error;
						}
						?>
						</div>
						<?php
					}
				}
				?>
			<h3 class="text-center">Iniciar Sesiòn</h3>
			<div class="login-form">
				<form action="" method="post" id="loginForm" accept-charset="utf-8">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Nombre de usuario</b></label>
						<input id="username" name="username" type="text" class="form-control" placeholder="Ingresa tu usuario" required>
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Contraseña</b></label>
						<!-- <a href="#" class="link float-right">Forget Password ?</a> -->
						
						<div class="position-relative">
							<input id="password" name="password" type="password" class="form-control" placeholder="**********" required>
							<div class="show-password">
								<i class="flaticon-interface"></i>
							</div>
						</div>
					</div>
				<div class="form-group form-action-d-flex mb-3">
					<div class="custom-control custom-checkbox">
						<!-- <input type="checkbox" class="custom-control-input" id="rememberme">
						<label class="custom-control-label m-0" for="rememberme">Remember Me</label> -->
					</div> 
					
					
					<button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold" name="login">Ingresar</button>
				</div>

				<div class="login-account">
					<span class="msg">Don't have an account yet ?</span>
					<a href="registrarse.php" id="show-signup" class="link">Sign Up</a>
				</div>
				</form>
				
			</div>
			
		</div>

		
	</div>
	<script src="<?php echo SERVERURL; ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo SERVERURL; ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo SERVERURL; ?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo SERVERURL; ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo SERVERURL; ?>assets/js/ready.js"></script>
	
</body>
</html>
