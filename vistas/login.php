<?php 
require_once './../bd/conexion.php';
require_once './../core/configGeneral.php';
// require_once './../clases/login.php';
session_start();

if (isset($_SESSION['loginIn'])) {
	header('location: home.php');
	exit;
}

if (isset($_POST['login'])) {
	if (empty($_POST['username'])) {
		 $errors[] = "El campo de nombre de usuario estaba vacío.";

	}elseif (empty($_POST['password'])) {
		$errors[] = "El campo de contraseña estaba vacío.";
		
	}elseif (!empty($_POST['username']) && !empty($_POST['password'])) {

		 $user_name = htmlentities(addslashes($_POST['username']));
         $password = htmlentities(addslashes($_POST['password']));

		$sql = "SELECT * FROM usuario WHERE username_usua =:username_usua";
		$result = $db->prepare($sql);
		$result->execute(array(':username_usua' => $user_name));
		$row=$result->fetch(PDO::FETCH_ASSOC);

		if ($result->rowCount() >0) {
            if (password_verify($password, $row['password_usua'])) {
            	
                $_SESSION['loginIn'] = 1;	   
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
<?php include_once 'includes/header.php'; ?>
<body class="login">
	<nav class="navbar sticky-top navbar-dark bg-primary">
		<a class="navbar-brand" href="home.php">SISTEMA DE CERTIFICACIÒN</a>
	</nav>
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
				<form action="" method="post" id="loginForm" autocomplete="off" accept-charset="utf-8">
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
					<a href="registrarse.php" id="show-signup" class="link">Registrarse</a>
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
