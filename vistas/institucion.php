<?php include_once './../core/configGeneral.php'; ?>
<?php include_once './../bd/conexion.php'; ?>
<?php include_once './core.php'; ?>
<?php include_once 'includes/header.php'; ?>
<!-- <?php 
// $consulta = "SELECT * FROM nivel";

// $query_listar = $db->prepare($consulta);
// $query_listar->execute();

// $result = $query_listar->fetchAll();
 ?> -->
<body>
	<div class="wrapper">
		<?php include_once './includes/navbar.php'; ?>
		<!-- Sidebar -->
		<?php include_once './includes/nav_lateral.php'; ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">INSTITUCIÓN</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
									
										<h4 class="card-title">Registro de las Instituciones</h4>
										<button class="btn btn-primary btn ml-auto" data-toggle="modal" data-target="#NuevaInstitucion">
											<i class="fa fa-plus"></i>
											Nueva Institución
										</button>
									</div>
								</div>	
								<div class="card-body">	
									<?php 
									include("./../modal/modalCrudInstitucion.php");
									 ?>
									<div id="tablaInstitucion"></div>
											
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php include_once 'includes/footer.php'; ?>
<script src="./../assets/js/infocentro/institucion.js" type="text/javascript" charset="utf-8" async defer></script>
<script>
$(document).ready(function() {
	$('#tablaInstitucion').load('./../ajax/institucionTabla.php');
})
</script>
