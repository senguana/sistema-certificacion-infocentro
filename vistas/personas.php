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
							<li class="breadcrumb-item active" aria-current="page">Persona</li>
						</ol>
					</nav>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
									
										<h4 class="card-title"><i class="fas fa-portrait"></i>Registro de las personas</h4>
										<button class="btn btn-primary btn ml-auto" data-toggle="modal" data-target="#NuevaComuna">
											<i class="fas fa-portrait"></i>
											Nuevo Comuna
										</button>
										<button style="background: white;"></button>
										<button class="btn btn-primary" data-toggle="modal" data-target="#NuevaPersona">
											<i class="fas fa-portrait"></i>
											Nuevo persona
										</button>
									</div>
								</div>	
								<div class="card-body">	
								<?php include("./../modal/modalCrudPersona.php");?>
								<?php include './../modal/modalCrudComuna.php'; ?>
								<div id="TablaPersona"></div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php include_once 'includes/footer.php'; ?>
<script src="./../assets/js/infocentro/persona.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript" charset="utf-8" async defer>
	$('document').ready(function() {
		$('#TablaPersona').load('./../ajax/personaTabla.php');
	}) 
</script>