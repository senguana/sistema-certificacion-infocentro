<?php require_once '../core/configGeneral.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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

	<script src="./../assets/js/infocentro/usuario.js" type="text/javascript" charset="utf-8" async defer></script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-signup animated fadeIn">
			<h3 class="text-center">Registrate</h3>
			<div class="row">
				<div class="col-md-12">
					<form  name="guardar_usuario" onsubmit="return false" action="return false" id="guardar_usuario" accept-charset="utf-8">
						<div id="resultados_ajax">
							
						</div>
						<div class="login-form"> 
							<div class="form-group">
								<label for="correo_usua" class="placeholder"><b>Email</b></label>
								<input  id="correo_usua" name="correo_usua" type="email" class="form-control" placeholder="example@gmail.com" required>
							</div>
							<div class="form-group">
								<label for="usuario_usua" class="placeholder"><b>Usuario</b></label>
								<div class="position-relative">
									<input  id="usuario_usua" name="usuario_usua" type="text" class="form-control" placeholder="usuario" required>
								</div>
							</div>
							<div class="form-group">
								<label for="password_usua" class="placeholder"><b>Password</b></label>
								<div class="position-relative">
									<input  id="password_usua" name="password_usua" type="password" class="form-control" placeholder="password" required>
									<div class="show-password">
										<i class="flaticon-interface"></i>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="confirmpassword" class="placeholder"><b>Confirm Password</b></label>
								<div class="position-relative">
									<input  id="confirmpassword" name="confirmpassword" type="password" class="form-control" placeholder="************" required>
									<div class="show-password">
										<i class="flaticon-interface"></i>
									</div>
								</div>
							</div>
							<div class="row form-action">
								<div class="col-md-6">
									<a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
								</div>
								<div class="col-md-6">
									
									<button type="submit" class="btn btn-primary float-right mt-3 mt-sm-0 fw-bold"  onclick="Registrar();" id="guardarDatos">Ingresar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				
			</div>
			
		</div>
	</div>

</body>
</html>

	