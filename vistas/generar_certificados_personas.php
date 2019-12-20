<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once 'core.php'; ?>

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
							<li class="breadcrumb-item active"><a href="home.php">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Generar certificados</li>
						</ol>
					</nav>
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
							
								<h4 class="card-title"><i class="fas fa-user-check"></i> Registro de las personas</h4>

								<a class="btn btn-primary btn ml-auto" href="personas.php">
									<i class="fas fa-arrow-circle-left"></i>
									Regresar
								</a>

							</div>
						</div>	
						<?php include_once './../modal/modalAsignarCursoPersona.php' ?>
				
						<div class="card-body">		
							<div id="resultado1"> </div>
							<div id="resultado2"> </div>
						</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include_once 'includes/footer.php'; ?>
<!--  <script src="./../lib/jquery-1.12.1.min.js"></script>  
<script src="../assets/js/core/bootstrap.min.js"></script> 
 <script src="./../lib/jquery-ui.js"></script>  --> 

<script src="./../assets/js/infocentro/generar.certificado.js"></script>
<script>
	$('#resultado1').load("./../ajax/personaGenerarCertificado.php");
</script>

