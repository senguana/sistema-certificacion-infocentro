<?php 
require_once './../bd/conexion.php';
require_once './../core/configGeneral.php';

session_start();

if(isset($_SESSION['userId'])) {
	header('location: ./home.php');	
}

$errors = array();

if($_POST) {		

	$username = $_POST['username']; 
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Se requiere nombre de usuario";
		} 

		if($password == "") {
			$errors[] = "Se requiere contraseña";
		}
	} else {
		$sql = "SELECT * FROM usuario WHERE username_usua = '$username'";
		$result = $db->query($sql);
		$row=$result->fetchColumn();
		if( $row== 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM usuario WHERE username_usua = '$username' AND password_usua = '$password'";
			$mainResult = $db->query($mainSql);

			if($mainResult) {
				$value = $mainResult->fetch();
				

				// set session
				$_SESSION['userId'] = $value['username_usua'];
				$_SESSION['correo'] = $value['correo_usua'];

				header('location: ./home.php');	
			} else{
				
				$errors[] = "Combinación incorrecta de nombre de usuario y/o contraseña";
			} // /else
		} else {		
			$errors[] = "El nombre de usuario no existe";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
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
			<?php if($errors) {
				foreach ($errors as $key => $value) {
					echo '<div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i>
					'.$value.'</div>';										
				}
			} 
					?>
	
			<h3 class="text-center">Iniciar Sesiòn</h3>
			<div class="login-form">
				<form action="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm" accept-charset="utf-8">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Username</b></label>
						<input id="username" name="username" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Password</b></label>
						<a href="#" class="link float-right">Forget Password ?</a>
						<div class="position-relative">
							<input id="password" name="password" type="password" class="form-control" required>
							<div class="show-password">
								<i class="flaticon-interface"></i>
							</div>
						</div>
					</div>
				<div class="form-group form-action-d-flex mb-3">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="rememberme">
						<label class="custom-control-label m-0" for="rememberme">Remember Me</label>
					</div>
					
					<input type="hidden" name="entrar" value="entrar">
					<button class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Ingresar</button>
				</div>

				<div class="login-account">
					<span class="msg">Don't have an account yet ?</span>
					<a href="#" id="show-signup" class="link">Sign Up</a>
				</div>
				</form>
				
			</div>
		</div>
		<?php include_once 'registrarse.php'; ?>
	</div>
	<script src="<?php echo SERVERURL; ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo SERVERURL; ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo SERVERURL; ?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo SERVERURL; ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo SERVERURL; ?>assets/js/ready.js"></script>
</body>
</html>