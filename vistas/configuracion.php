<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once './core.php'; ?>
<?php include_once 'includes/header.php'; ?>

<body>
	<div class="wrapper">
		<?php include_once './includes/navbar.php'; ?>
		<!-- Sidebar -->
		<?php include_once './includes/nav_lateral.php'; ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Configuración</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
									<div class="card-header">
										<div class="card-title"><i class="fas fa-cog"></i> Configuración</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label for="exampleFormControlFile1">Example file input</label>
											<input type="file" class="form-control-file" id="exampleFormControlFile1">
										</div>
									</div>
									<div class="card-action">
										<button class="btn btn-success">Submit</button>
										<button class="btn btn-danger">Cancel</button>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<?php include_once 'includes/footer.php'; ?>
<script src="./../assets/js/infocentro/alumno.basica.js" type="text/javascript" charset="utf-8" async defer></script>
<script>
	$('#alumnoBasicaTabla').load('../ajax/alumnoBasicaTabla.php');


</script>

